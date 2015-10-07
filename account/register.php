<?php session_start();
require_once('../system/config.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" class="en-gb">
<head xmlns:og="http://ogp.me/ns#" xmlns:fb="http://ogp.me/ns/fb#">
<meta http-equiv="imagetoolbar" content="false"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<!-- YOU CAN TOUCH NOW -->
<!-- (If you know what you're doing) -->
<!-- Description of CMS -->
<?php include(WEBKIT.'desc.php'); ?>
<!-- Description of CMS END -->
<title><?php echo $cms_lang['12']; ?></title>
<!-- The Styles & Javascripts of the CMS -->
<link rel="shortcut icon" href="<?php echo BASE_URL ?>assets/images/logos/favicon.png"/>
<link rel="search" type="application/opensearchdescription+xml" href="en-gb/data/opensearch" title="Battle.net Search"/>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo BASE_URL ?>assets/account/static/local-common/css/common.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo BASE_URL ?>assets/account/static/css/bnet.css" />
<link rel="stylesheet" type="text/css" media="print" href="<?php echo BASE_URL ?>assets/account/static/css/bnet-print.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo BASE_URL ?>assets/account/static/css/legal/ratings.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo BASE_URL ?>assets/account/static/css/inputs.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo BASE_URL ?>assets/account/static/css/account-creation/streamlined-creation.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo BASE_URL ?>assets/account/static/css/locale/en-gb.css" />
<script type="text/javascript" src="<?php echo BASE_URL ?>assets/account/static/local-common/js/third-party/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL ?>assets/account/static/local-common/js/common/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL ?>assets/account/static/local-common/js/third-party/class-inheritance.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL ?>assets/account/static/local-common/js/third-party/swfobject-2.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL ?>assets/account/static/local-common/js/common.js"></script>
<script type="text/javascript">
//<![CDATA[
var Core = Core || {},
Login = Login || {};
Core.staticUrl = '<?php echo BASE_URL ?>assets/account/static';
Core.sharedStaticUrl = '<?php echo BASE_URL ?>assets/account/static/local-common';
Core.baseUrl = '<?php echo BASE_URL ?>assets/account/static';
Core.projectUrl = '<?php echo BASE_URL ?>assets/account/static';
Core.cdnUrl = 'http://media.blizzard.com/';
Core.supportUrl = 'support/';
Core.secureSupportUrl = 'support/';
Core.project = 'FlameCMS';
Core.locale = 'en-gb';
Core.language = 'en';
Core.region = 'eu';
Core.shortDateFormat = 'dd/MM/yyyy';
Core.dateTimeFormat = 'dd/MM/yyyy HH:mm';
Core.loggedIn = false;
Core.userAgent = 'web';
Login.embeddedUrl = '<?php echo ACCOUNT_URL ?>login';
var Flash = Flash || {};
Flash.videoPlayer = '';
Flash.videoBase = '';
Flash.ratingImage = '';
Flash.expressInstall = '';
var _gaq = _gaq || [];
_gaq.push(['_setAllowLinker', true]);
_gaq.push(['_trackPageview']);
//]]>
</script>
</head>
<body class="en-gb creation">
<div id="layout-top">
	<div class="wrapper">
		<div id="header">
			<div id="search-bar">
				<form action="search" id="search-form" method="get">
					<div>
						<input accesskey="q" alt="Search Battle.net" id="search-field" maxlength="35" name="q" tabindex="50" type="text" value="Search Battle.net"/>
						<input id="search-button" title="Search Battle.net" tabindex="50" type="submit" value=""/>
					</div>
				</form>
			</div>
			<h1 id="logo"><a accesskey="h" href="" tabindex="50"></a></h1>
			<div id="navigation">
				<div id="page-menu" class="large">
					<h2><a href="<?php echo ACCOUNT_URL ?>#"> <?php echo $cms_lang['13']; ?>
					</a></h2>
					<h2 class="second-header"></h2>
					<span class="clear">
					<!-- -->
					</span>
				</div>
				<span class="clear">
				<!-- -->
				</span>
			</div>
		</div>
		<!-- User Panel -->
		<?php include(WEBKIT.'userpanel.php'); ?>
		<!-- User Panel END -->
	</div>
</div>
<div id="layout-middle">
	<div class="wrapper">
		<div id="content">
			<div id="page-header">
				<p class="privacy-message">
					<?php echo $cms_lang['14']; ?>
				</p>
			</div>
		</div>
		<div id="page-content">
		<?php
		if(isset($_POST['submit']))
		{
			$country		= $_GET['country'];
			$dobD			= $_POST['dobDay'];
			$dobM			= $_POST['dobMonth'];
			$dobY			= $_POST['dobYear'];
			$dob			= date("Y-m-d", strtotime($dobY . "-" . $dobM . "-" . $dobD));
			$username		= filter_var($_POST['username'], FILTER_SANITIZE_STRING);
			$firstName		= filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
			$lastName		= filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
			$email			= filter_var($_POST['emailAddress'], FILTER_VALIDATE_EMAIL);
			$password		= filter_var($_POST['password'], FILTER_SANITIZE_STRING);
			$question		= filter_var($_POST['question1'], FILTER_SANITIZE_STRING);
			$answer			= filter_var($_POST['answer1'], FILTER_SANITIZE_STRING);
			$code			= md5(uniqid(rand()));
			// Sha Password Hash
            $sha_pass_hash_server	= sha1(strtoupper($username) . ":" . strtoupper($password));
            $sha_pass_hash_cms		= sha1(strtoupper($email) . ":" . strtoupper($password));

			/**
			 *  Whether the email format is correct
			 */
			if(filter_var($email, FILTER_VALIDATE_EMAIL)){

				$checkEmailSQL 	= $connect->WebQuery("SELECT * FROM account WHERE email = '{$email}'");
				$checkEmail	= mysqli_num_rows($checkEmailSQL) > 0;
				if($checkEmail){
					
					echo'
					<center>
						<p class="text-red title">This Email is already used.</p>
					</center>
					<meta http-equiv="refresh" content="2;url='.ACCOUNT_URL.'register"/>';
				}
				else
				{
					// Register Server
					$register	= $connect->AuthQuery("INSERT INTO `account`(`username`,`sha_pass_hash`,`email`) VALUES ( UPPER('{$username}),'{$sha_pass_hash_server}','{$email}')");
					$IdAccount	= $connect->AuthQuery("SELECT MAX(id) FROM account");
					$IdWoW		= MysqliResultFlame($IdAccount);
					// RBAC Account Permissions Server
					$register	= $connect->AuthQuery("INSERT INTO `rbac_account_permissions`(`accountId`,`permissionId`) VALUES ( '{$IdWoW}','195')");
					// Register CMS
					$createAccount	= $connect->WebQuery("INSERT INTO `account`(`first_name`,`last_name`,`email`,`password`,`secret_question`,`answer_question`,`country`,`date_of_birth`,`activation_code`) VALUES ('{$firstName}','{$lastName}','{$email}','{$sha_pass_hash_cms}','{$question}',UPPER('{$answer}'),'{$country }','{$dob}','{$code})");
					if($createAccount)
					{
						$to		  = $email;
						$subject  = "Confirmation from ".TITLE." to ".$firstName." ".$lastName."";
						$header   = ": Confirmation from ".TITLE."";
						$message  = "Please click the link below to verify and activate your account. rn";
						$message .= "".BASE_URL."confirm?passkey=".$code."";

						$sentmail = mail($to,$subject,$message,$header);

						if($sentmail)
						{
						echo '
						<div class="alert-page ">
							<div class="alert-page-message success-page">
								<p class="text-green title">
									<strong>Account Creation Successful!</strong>
								</p>
								<div class="result-desc">
									<div class="email-verification-highlight">
										<h6>Next: Confirm your email address.</h6>
										<p>
											A verification email has been sent to the e-mail address displayed below.
										</p>
										<p>
											Click the link in the email to verify this e-mail address. Verifying your email address ensures that Customer Support can contact you if you need help. It also allows you to make purchases and make changes to your account security.
										</p>
									</div>
									<h6>Account Name (Email):</h6>
									<p class="account-name">
										'. $email.'
									</p>
									<h6>You will log in with this email address.</h6>
									<p>
										You will be asked for this address when logging into the Battle.net application, web sites, or game clients. You can change this address any time in <a href="'.ACCOUNT_URL.'login" tabindex="1">Account Management</a>.
									</p>
								</div>
							</div>
						</div>
						<br/>
						<br/>';
						}
						else
						{
							echo '<p class="text-red title"><strong>Cannot send Confirmation link to your e-mail address</strong></p>';
						}
					}
				}
			}else{
				echo'<center>
						<p class="text-red title">Email invalid</p>
					</center>
					<meta http-equiv="refresh" content="2;url='.ACCOUNT_URL.'register"/>';
			}
		}else{
		?>
			<form action="" method="post" class="country-select">
				<input type="hidden" id="csrftoken" name="csrftoken" value="6d42030c-2ad6-4fa2-b3be-0ba74e5aa7aa"/>
				<div class="input-row input-row-select">
					<span class="input-left">
					<label for="country">
					<span class="label-text"><?php echo $cms_lang['15']; ?> </span>
					<span class="input-required"></span>
					</label>
					</span>
					<!--
-->
					<span class="input-right">
					<span class="input-select input-select-small">
					<select name="country" id="country" class="small border-5 glow-shadow-2" tabindex="1">
						<?php
						$country	= $connect->WebQuery("SELECT * FROM countries WHERE id");
						$countries	= isset($_GET['country']) ? $_GET['country'] : null ;
						while($get	= mysqli_fetch_array($country))
						{
							if($get['isoAlpha3'] == $countries ){
								echo'<option value="'.$get["isoAlpha3"].'"selected="selected">'.$get["countryName"].'</option>';
							}else{
								echo'<option value="'.$get["isoAlpha3"].'">'.$get["countryName"].'</option>';
							}
						}
						?>
					</select>
					<span class="inline-message " id="country-message">&nbsp;</span>
					</span>
					<button class="ui-button button1" type="submit" id="country-submit" tabindex="1" style="display: none;"><span class="button-left"><span class="button-right"><?php echo $cms_lang['16']; ?></span></span></button>
					</span>
				</div>
				<div class="input-row input-row-note" id="country-warning" style="display: none">
					<div class="input-note border-5 glow-shadow">
						<div id="countryGlobal" class="input-note-content">
							<p class="caption"><?php echo $cms_lang['101']; ?></p>
							<p>
								<a class="ui-button button1" href="<?php echo ACCOUNT_URL ?>register" tabindex="1"><span class="button-left"><span class="button-right"><?php echo $cms_lang['16']; ?></span></span></a>
								<a class="ui-cancel " href="<?php echo ACCOUNT_URL ?>register" tabindex="1">
								<span>
								<?php echo $cms_lang['68']; ?> </span>
								</a>
							</p>
						</div>
						<div id="countryCHINA" class="input-note-content">
							<p class="caption"><?php echo $cms_lang['102']; ?></p>
							<p>
								<a class="ui-button button1" href="?country=CHINA" id="stayTaiwan" tabindex="1"><span class="button-left"><span class="button-right">YES, I HAVE A TAIWANESE WORLD OF WARCRAFT ACCOUNT</span></span></a><br/>
								<a class="ui-button button1" href="<?php echo ACCOUNT_URL ?>register" id="gotoChina" tabindex="1"><span class="button-left"><span class="button-right">GO TO BATTLE.NET IN CHINA</span></span></a>
								<a class="ui-cancel " href="<?php echo ACCOUNT_URL ?>register" tabindex="1">
								<span>
								<?php echo $cms_lang['68']; ?> </span>
								</a>
							</p>
						</div>
						<div class="input-note-arrow">
						</div>
					</div>
				</div>
			</form>
			<script type="text/javascript">
		//<![CDATA[
		(function() {
		var countrySubmit = document.getElementById('country-submit');
		countrySubmit.style.display = 'none';
		})();
		//]]>
			</script>
			<div id="page-content">
				<form action="" method="post" id="creation" novalidate="novalidate">
					<div class="input-hidden">
						<div class="input-hidden">
							<input type="hidden" id="csrftoken" name="csrftoken" value="6d42030c-2ad6-4fa2-b3be-0ba74e5aa7aa"/>
						</div>
						<input type="hidden" name="country" value="CRI"/>
						<input type="hidden" name="ret" value=""/>
						<input type="hidden" name="sourceType" value=""/>
					</div>
					<div class="form-blockable" id="country-change">
						<div class="input-row input-row-select">
							<span class="input-left">
							<label for="dobDay">
							<span class="label-text">
							<?php echo $cms_lang['17']; ?>
							</span>
							<span class="input-required">*</span>
							</label>
							</span>
							<!--
-->
							<span class="input-right">
							<span class="input-select input-select-extra-extra-small">
							<select name="dobMonth" id="dobMonth" class="extra-extra-small border-5 glow-shadow-2" tabindex="1" required="required">
								<?php
								echo'
								<option value="" selected="selected">'.$cms_lang['18'].'</option>
								<option value="1">'.$cms_lang['19'].'</option>
								<option value="2">'.$cms_lang['20'].'</option>
								<option value="3">'.$cms_lang['21'].'</option>
								<option value="4">'.$cms_lang['22'].'</option>
								<option value="5">'.$cms_lang['23'].'</option>
								<option value="6">'.$cms_lang['24'].'</option>
								<option value="7">'.$cms_lang['25'].'</option>
								<option value="8">'.$cms_lang['26'].'</option>
								<option value="9">'.$cms_lang['27'].'</option>
								<option value="10">'.$cms_lang['28'].'</option>
								<option value="11">'.$cms_lang['29'].'</option>
								<option value="12">'.$cms_lang['30'].'</option>
								'; ?>
							</select>
							<span class="inline-message no-text-clear" id="dobMonth-message">&#160;</span>
							</span>
							<span class="input-select input-select-extra-extra-extra-small">
							<select name="dobDay" id="dobDay" class="extra-extra-extra-small border-5 glow-shadow-2" tabindex="1" required="required">
								<option value="" selected="selected"><?php echo $cms_lang['31']; ?>
								</option>
								<?php
								for($day=1;$day<=31;$day++){
									echo'<option value="'.$day.'">'.$day.'</option>';
								}
								?>
							</select>
							<span class="inline-message no-text-clear" id="dobDay-message">&#160;</span>
							</span>
							<span class="input-select input-select-extra-extra-extra-small">
							<select name="dobYear" id="dobYear" class="extra-extra-extra-small border-5 glow-shadow-2" tabindex="1" required="required">
								<option value="" selected="selected"><?php echo $cms_lang['32']; ?>
								</option>
								<?php
								for($year=2015;$year>=1905;$year--){
									echo'<option value="'.$year.'">'.$year.'</option>';
								}
								?>
							</select>
							<span class="inline-message no-text-clear" id="dobYear-message">&#160;</span>
							</span>
							</span>
						</div>
						<?php
						// It currently only supports TrinityCore 6.x.x
						// Still will not support 3.3.5a, 4.3.4 and 5.4.8
						?>
						<div class="input-row input-row-text">
							<span class="input-left">
							<label for="firstname">
							<span class="label-text"><?php echo $cms_lang['33']; ?>: </span>
							<span class="input-required">*</span>
							</label>
							</span>
							<!--
-->
							<span class="input-right">
							<span class="input-text input-text-small">
							<input type="text" name="username" value="" id="username" class="small border-5 glow-shadow-2" autocomplete="off" maxlength="32" tabindex="1" required="required" placeholder="<?php echo $cms_lang['33']; ?>"/>
							<span class="inline-message " id="username-message">&#160;</span>
							</span>
							</span>
						</div>
						<div class="input-row input-row-text">
							<span class="input-left">
							<label for="firstname">
							<span class="label-text">
							<?php echo $cms_lang['34']; ?> </span>
							<span class="input-required">*</span>
							</label>
							</span>
							<!--
-->
							<span class="input-right">
							<span class="input-text input-text-small">
							<input type="text" name="firstname" value="" id="firstname" class="small border-5 glow-shadow-2" autocomplete="off" maxlength="32" tabindex="1" required="required" placeholder="<?php echo $cms_lang['35']; ?>"/>
							<span class="inline-message " id="firstname-message">&#160;</span>
							</span>
							<span class="input-text input-text-small">
							<input type="text" name="lastname" value="" id="lastname" class="small border-5 glow-shadow-2" autocomplete="off" maxlength="32" tabindex="1" required="required" placeholder="<?php echo $cms_lang['36']; ?>"/>
							<span class="inline-message " id="lastname-message">&#160;</span>
							</span>
							</span>
						</div>
						<div class="input-row input-row-text">
							<span class="input-left">
							<label for="emailAddress">
							<span class="label-text">
							<?php echo $cms_lang['37']; ?> </span>
							<span class="input-required">*</span>
							</label>
							</span>
							<!--
-->
							<span class="input-right">
							<span class="input-text input-text-small">
							<input type="email" name="emailAddress" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" value="" id="emailAddress" class="small border-5 glow-shadow-2" autocomplete="off" onpaste="return false;" maxlength="320" tabindex="1" required="required" placeholder="<?php echo $cms_lang['38']; ?>"/>
							<span class="inline-message " id="emailAddress-message"><span class="tip-inline tip-default"></span>
							<span class="tip-inline tip-information" style="display: none;"><?php echo $cms_lang['39']; ?></span>
							<span class="tip-inline tip-warning" style="display: none;"><?php echo $cms_lang['40']; ?></span>
							</span>
							</span>
							<span class="input-text input-text-small">
							<input type="email" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" name="emailAddressConfirmation" value="" id="emailAddressConfirmation" class="small border-5 glow-shadow-2" autocomplete="off" onpaste="return false;" maxlength="320" tabindex="1" required="required" placeholder="<?php echo $cms_lang['41']; ?>"/>
							<span class="inline-message " id="emailAddressConfirmation-message"><span class="tip-inline tip-default"></span>
							<span class="tip-inline tip-information" style="display: none;"></span>
							<span class="tip-inline tip-warning" style="display: none;"><?php echo $cms_lang['42']; ?></span>
							</span>
							</span>
							</span>
						</div>
						<div class="input-row input-row-text">
							<span class="input-left">
							<label for="password">
							<span class="label-text">
							<?php echo $cms_lang['43']; ?> </span>
							<span class="input-required">*</span>
							</label>
							</span>
							<!--
-->
							<span class="input-right">
							<span class="input-text input-text-small">
							<input type="password" id="password" name="password" value="" class="small border-5 glow-shadow-2" autocomplete="off" onpaste="return false;" maxlength="16" tabindex="1" required="required" placeholder="<?php echo $cms_lang['44']; ?>"/>
							<span class="inline-message " id="password-message">&#160;</span>
							</span>
							<span class="input-text input-text-small">
							<input type="password" id="rePassword" name="rePassword" value="" class="small border-5 glow-shadow-2" autocomplete="off" onpaste="return false;" maxlength="16" tabindex="1" required="required" placeholder="<?php echo $cms_lang['45']; ?>"/>
							<span class="inline-message " id="rePassword-message">&#160;</span>
							</span>
							</span>
						</div>
						<div class="input-row input-row-note" id="password-strength" style="display: none">
							<div class="input-note border-5 glow-shadow">
								<div class="input-note-left">
									<p class="caption">
										<?php echo $cms_lang['46']; ?>
									</p>
								</div>
								<div class="input-note-right border-5">
									<div class="password-strength">
										<span class="password-result">
										<?php echo $cms_lang['47']; ?> <strong id="password-result"></strong>
										</span>
										<span class="password-rating"><span class="rating rating-default" id="password-rating"></span></span>
									</div>
									<ul class="password-level" id="password-level">
										<li id="password-level-0">
										<span class="icon-16"></span>
										<span class="icon-16-label"><?php echo $cms_lang['48']; ?></span>
										</li>
										<li id="password-level-1">
										<span class="icon-16"></span>
										<span class="icon-16-label"><?php echo $cms_lang['49']; ?></span>
										</li>
										<li id="password-level-2">
										<span class="icon-16"></span>
										<span class="icon-16-label"><?php echo $cms_lang['50']; ?></span>
										</li>
										<li id="password-level-3">
										<span class="icon-16"></span>
										<span class="icon-16-label"><?php echo $cms_lang['51']; ?></span>
										</li>
										<li id="password-level-4">
										<span class="icon-16"></span>
										<span class="icon-16-label"><?php echo $cms_lang['52']; ?></span>
										</li>
									</ul>
								</div>
								<div class="clear">
								</div>
								<div class="input-note-arrow">
								</div>
							</div>
						</div>
						<div class="input-row input-row-select">
							<span class="input-left">
							<label for="question1">
							<span class="label-text">
							<?php echo $cms_lang['53']; ?> </span>
							<span class="input-required">*</span>
							</label>
							</span>
							<!--
-->
							<span class="input-right">
							<span class="input-select input-select-small">
							<select name="question1" id="question1" class="small border-5 glow-shadow-2" tabindex="1" required="required">
								<option value="" selected="selected"><?php echo $cms_lang['54']; ?></option>
								<option value="19"><?php echo $cms_lang['55']; ?></option>
								<option value="20"><?php echo $cms_lang['56']; ?></option>
								<option value="21"><?php echo $cms_lang['57']; ?></option>
								<option value="22"><?php echo $cms_lang['58']; ?></option>
								<option value="23"><?php echo $cms_lang['59']; ?></option>
								<option value="24"><?php echo $cms_lang['60']; ?></option>
							</select>
							</span>
							<span class="input-text input-text-small">
							<input type="text" name="answer1" value="" id="answer1" class="small border-5 glow-shadow-2" autocomplete="off" maxlength="100" tabindex="1" required="required" placeholder="<?php echo $cms_lang['61']; ?>"/>
							</span>
							</span>
						</div>
						<div class="input-row input-row-note question-info" id="question-info" style="margin-top: 0; min-height: 24px;">
							<span class="inline-message">
							<span class="tip-inline tip-default"></span>
							<span class="tip-inline tip-information" style="display: none;"><?php echo $cms_lang['62']; ?></span>
							<span class="tip-inline tip-warning" style="display: none;"></span>
							</span>
						</div>
						<div class="input-row input-row-text">
							<span class="input-left">
							<label for="agreedToChatPolicy">
							<span class="label-text"><?php echo $cms_lang['63']; ?></span>
							<span class="input-required">*</span>
							</label>
							</span>
							<span class="input-right">
							<div class="agreement-check">
								<p class="tou-desc" align="justify">
									<?php echo $cms_lang['64']; ?>
								</p>
							</div>
							</span>
						</div>
						<div class="input-row input-row-checkbox input-row-important">
							<span class="input-left">
							<span class="title-text">
							</span>
							<span class="input-required"></span>
							</span>
							<!--
-->
							<span class="input-right">
							<label for="agreedToChatPolicy">
							<input type="checkbox" name="agreedToChatPolicy" value="true" id="agreedToChatPolicy" tabindex="1" required="required"/>
							<span class="label-text"><?php echo $cms_lang['65']; ?><span class="input-required">*</span>
							</span>
							</label>
							</span>
							<span class="input-left">
							<span class="title-text">
							</span>
							<span class="input-required"></span>
							</span>
							<!--
-->
							<span class="input-right">
							<label for="agreedToToU">
							<input type="checkbox" name="agreedToToU" value="true" id="agreedToToU" tabindex="1" required="required"/>
							<span class="label-text"><?php echo $cms_lang['66']; ?><span class="input-required">*</span>
							</span>
							</label>
							</span>
						</div>
						<div class="submit-row">
							<div class="input-left">
								&#160;
							</div>
							<div class="input-right">
								<button class="ui-button button1" type="submit" name="submit" onclick="Form.submit(this)" id="country-submit" tabindex="1">
									<span class="button-left">
										<span class="button-right"><?php echo $cms_lang['67']; ?></span>
									</span>
								</button>
								<a class="ui-cancel " href="" tabindex="1">
								<span> <?php echo $cms_lang['68']; ?> </span>
								</a>
							</div>
						</div>
						<div class="form-block" id="country-change-overlay" style="display: none">
						</div>
					</div>
					<script type="text/javascript">
					//<![CDATA[
					var FormMsg = {
					'headerSingular': '<?php echo $cms_lang['69']; ?>',
					'headerMultiple': '<?php echo $cms_lang['70']; ?>',
					'fieldMissing': '<?php echo $cms_lang['71']; ?>',
					'fieldsMissing': '<?php echo $cms_lang['72']; ?>',
					'emailInfo': '<?php echo $cms_lang['73']; ?>',
					'emailMissing': '<?php echo $cms_lang['74']; ?>',
					'emailInvalid': '<?php echo $cms_lang['75']; ?>',
					'emailMismatch': '<?php echo $cms_lang['76']; ?>',
					'passwordInvalid': '<?php echo $cms_lang['77']; ?>',
					'passwordMismatch': '<?php echo $cms_lang['78']; ?>',
					'tosDisagree': '<?php echo $cms_lang['79']; ?>',
					'taxInvoiceSelect': '<?php echo $cms_lang['80']; ?>'
					, 'emailError1': '<?php echo $cms_lang['81']; ?>'
					, 'emailError2': '<?php echo $cms_lang['82']; ?>'
					, 'passwordError1': '<?php echo $cms_lang['83']; ?>'
					, 'passwordError2': '<?php echo $cms_lang['84']; ?>'
					, 'passwordStrength0': '<?php echo $cms_lang['85']; ?>'
					, 'passwordStrength1': '<?php echo $cms_lang['86']; ?>'
					, 'passwordStrength2': '<?php echo $cms_lang['87']; ?>'
					, 'passwordStrength3': '<?php echo $cms_lang['88']; ?>'
					, 'errorsHeader': '<?php echo $cms_lang['89']; ?>'
					, 'errorHeader': '<?php echo $cms_lang['90']; ?>'
					, 'errorReq': '<?php echo $cms_lang['91']; ?>'
					, 'errorMismatch': '<?php echo $cms_lang['92']; ?>'
					, 'errorEmail': '<?php echo $cms_lang['93']; ?>'
					, 'errorPlease': '<?php echo $cms_lang['94']; ?>'
					, 'errorTerms': '<?php echo $cms_lang['95']; ?>'
					, 'errorChat': '<?php echo $cms_lang['96']; ?>'
					, 'errorAntiCheating': '<?php echo $cms_lang['97']; ?>'
					, 'selectCountry': '<?php echo $cms_lang['98']; ?>'
					};
					//]]>
					</script>
				</form>
				
		<?php }?>
			</div>
			<div class="templates">
				<div class="alert error closeable border-4 glow-shadow" style=" ">
					<div class="alert-inner">
						<div class="alert-message">
							<p class="title">
								<strong><?php echo $cms_lang['99']; ?></strong>
							</p>
						</div>
					</div>
					<a class="alert-close" href="#" onclick="$(this).parent().fadeOut(250, function() { $(this).css({opacity:0}).animate({height: 0}, 100, function() { $(this).remove(); }); }); return false;"><?php echo $cms_lang['100']; ?></a>
					<span class="clear">
					<!-- -->
					</span>
				</div>
			</div>
			<script type="text/javascript">
			//<![CDATA[
			var inputs,
			creation,
			analytics;
			$(function() {
			inputs = new Inputs("#creation");
			creation = new Creation("#creation");
			if (typeof(Analytics) != "undefined") {
			analytics = Analytics.create();
			}
			Core.appendFrame('https://bs.serving-sys.com/BurstingPipe/ActivityServer.bs?cn=as&amp;ifrm=1&amp;ActivityID=99739&amp;Value=Revenue&amp;OrderID=OrderID&amp;ProductID=ProductID&amp;ProductInfo=ProductInfo&amp;rnd=' + Math.random());
			});
			//]]>
			</script>
			<!--[if IE 6]> <script type="text/javascript" src="//bneteu-a.akamaihd.net/account/static/local-common/js/third-party/DD_belatedPNG.4JzIy.js"></script>
			<script type="text/javascript">
			//<![CDATA[
			DD_belatedPNG.fix('.icon-32');
			DD_belatedPNG.fix('.icon-64');
			DD_belatedPNG.fix('.input-note-arrow');
			//]]>
			</script>
			<![endif]-->
		</div>
	</div>
</div>
<div id="layout-bottom-divider"></div>
<div id="layout-bottom">
	<div class="wrapper">
		<?php footer(); ?>
	</div>
</div>
<script type="text/javascript">
//<![CDATA[
var csrftoken = "";
$(function() {
Locale.dataPath = "data/i18n.frag.xml";
});
var fullTimeDisplay = true;
//]]>
</script>
<script>
//<![CDATA[
var xsToken = '';
var supportToken = '';
var jsonSearchHandlerUrl = '\//eu.battle.net';
var Msg = Msg || {};
Msg.support = {
ticketNew: 'Ticket {0} was created.',
ticketStatus: 'Ticket {0}’s status changed to&#160;{1}.',
ticketOpen: 'Open',
ticketAnswered: 'Answered',
ticketResolved: 'Resolved',
ticketCanceled: 'Cancelled',
ticketArchived: 'Archived',
ticketInfo: 'Need&#160;Info',
ticketAll: 'View All Tickets'
};
Msg.cms = {
requestError: 'Your request cannot be completed.',
ignoreNot: 'Not ignoring this user',
ignoreAlready: 'Already ignoring this user',
stickyRequested: 'Sticky requested',
stickyHasBeenRequested: 'You have already sent a sticky request for this topic.',
postAdded: 'Post added to tracker',
postRemoved: 'Post removed from tracker',
userAdded: 'User added to tracker',
userRemoved: 'User removed from tracker',
validationError: 'A required field is incomplete',
characterExceed: 'The post body exceeds XXXXXX characters.',
searchFor: "Search for",
searchTags: "Articles tagged:",
characterAjaxError: "You may have become logged out. Please refresh the page and try again.",
ilvl: "Level {0}",
shortQuery: "Search requests must be at least three characters long.",
editSuccess: "Success. Reload?",
postDelete: "Are you sure you want to delete this post?",
throttleError: "You must wait before you can post again."
};
Msg.bml= {
bold: 'Bold',
italics: 'Italics',
underline: 'Underline',
list: 'Unordered List',
listItem: 'List Item',
quote: 'Quote',
quoteBy: 'Posted by {0}',
unformat: 'Remove Formating',
cleanup: 'Fix Linebreaks',
code: 'Code Blocks',
item: 'WoW Item',
itemPrompt: 'Item ID:',
url: 'URL',
urlPrompt: 'URL Address:'
};
Msg.ui= {
submit: 'Submit',
cancel: 'Cancel',
reset: 'Reset',
viewInGallery: 'View in gallery',
loading: 'Loading…',
unexpectedError: 'An error has occurred',
fansiteFind: 'Find this on…',
fansiteFindType: 'Find {0} on…',
fansiteNone: 'No fansites available.',
flashErrorHeader: 'Adobe Flash Player must be installed to see this content.',
flashErrorText: 'Download Adobe Flash Player',
flashErrorUrl: 'http://get.adobe.com/flashplayer/',
save: 'Save'
};
Msg.grammar= {
colon: '{0}:',
first: 'First',
last: 'Last',
ellipsis: '…'
};
Msg.fansite= {
achievement: 'achievement',
character: 'character',
faction: 'faction',
'class': 'class',
object: 'object',
talentcalc: 'talents',
skill: 'profession',
quest: 'quest',
spell: 'spell',
event: 'event',
title: 'title',
arena: 'arena team',
guild: 'guild',
zone: 'zone',
item: 'item',
race: 'race',
npc: 'NPC',
pet: 'pet'
};
Msg.search= {
noResults: 'There are no results to display.',
kb: 'Support',
post: 'Forums',
article: 'Blog Articles',
static: 'General Content',
wowcharacter: 'Characters',
wowitem: 'Items',
wowguild: 'Guilds',
wowarenateam: 'Arena Teams',
url: 'Suggested Links',
friend: 'Friends',
product: 'Marketplace Products',
other: 'Other'
};
//]]>
</script>
<script type="text/javascript" src="<?php echo BASE_URL ?>assets/account/static/js/bam.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL ?>assets/account/static/local-common/js/common/menu.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL ?>assets/account/static/local-common/js/third-party/jquery-ui-1.10.2.custom.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL ?>assets/account/static/js/inputs.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL ?>assets/account/static/js/account-creation/streamlined-creation.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL ?>assets/account/static/js/account-creation/analytics.js"></script>
<script>
//<![CDATA[
(function() {
var ga = document.createElement('script');
var src = "../../../ssl.google-analytics.com/ga.js";
if ('http:' == document.location.protocol) {
src = "../../../www.google-analytics.com/ga.js";
}
ga.type = 'text/javascript';
ga.setAttribute('async', 'true');
ga.src = src;
var s = document.getElementsByTagName('script');
s = s[s.length-1];
s.parentNode.insertBefore(ga, s.nextSibling);
})();
//]]>
</script>
<script>
//<![CDATA[
var xsToken = '';
var supportToken = '';
var jsonSearchHandlerUrl = '\//eu.battle.net';
var Msg = Msg || {};
Msg.support = {
ticketNew: 'Ticket {0} was created.',
ticketStatus: 'Ticket {0}’s status changed to&#160;{1}.',
ticketOpen: 'Open',
ticketAnswered: 'Answered',
ticketResolved: 'Resolved',
ticketCanceled: 'Cancelled',
ticketArchived: 'Archived',
ticketInfo: 'Need&#160;Info',
ticketAll: 'View All Tickets'
};
Msg.cms = {
requestError: 'Your request cannot be completed.',
ignoreNot: 'Not ignoring this user',
ignoreAlready: 'Already ignoring this user',
stickyRequested: 'Sticky requested',
stickyHasBeenRequested: 'You have already sent a sticky request for this topic.',
postAdded: 'Post added to tracker',
postRemoved: 'Post removed from tracker',
userAdded: 'User added to tracker',
userRemoved: 'User removed from tracker',
validationError: 'A required field is incomplete',
characterExceed: 'The post body exceeds XXXXXX characters.',
searchFor: "Search for",
searchTags: "Articles tagged:",
characterAjaxError: "You may have become logged out. Please refresh the page and try again.",
ilvl: "Level {0}",
shortQuery: "Search requests must be at least three characters long.",
editSuccess: "Success. Reload?",
postDelete: "Are you sure you want to delete this post?",
throttleError: "You must wait before you can post again."
};
Msg.bml= {
bold: 'Bold',
italics: 'Italics',
underline: 'Underline',
list: 'Unordered List',
listItem: 'List Item',
quote: 'Quote',
quoteBy: 'Posted by {0}',
unformat: 'Remove Formating',
cleanup: 'Fix Linebreaks',
code: 'Code Blocks',
item: 'WoW Item',
itemPrompt: 'Item ID:',
url: 'URL',
urlPrompt: 'URL Address:'
};
Msg.ui= {
submit: 'Submit',
cancel: 'Cancel',
reset: 'Reset',
viewInGallery: 'View in gallery',
loading: 'Loading…',
unexpectedError: 'An error has occurred',
fansiteFind: 'Find this on…',
fansiteFindType: 'Find {0} on…',
fansiteNone: 'No fansites available.',
flashErrorHeader: 'Adobe Flash Player must be installed to see this content.',
flashErrorText: 'Download Adobe Flash Player',
flashErrorUrl: 'http://get.adobe.com/flashplayer/',
save: 'Save'
};
Msg.grammar= {
colon: '{0}:',
first: 'First',
last: 'Last',
ellipsis: '…'
};
Msg.fansite= {
achievement: 'achievement',
character: 'character',
faction: 'faction',
'class': 'class',
object: 'object',
talentcalc: 'talents',
skill: 'profession',
quest: 'quest',
spell: 'spell',
event: 'event',
title: 'title',
arena: 'arena team',
guild: 'guild',
zone: 'zone',
item: 'item',
race: 'race',
npc: 'NPC',
pet: 'pet'
};
Msg.search= {
noResults: 'There are no results to display.',
kb: 'Support',
post: 'Forums',
article: 'Blog Articles',
static: 'General Content',
wowcharacter: 'Characters',
wowitem: 'Items',
wowguild: 'Guilds',
wowarenateam: 'Arena Teams',
url: 'Suggested Links',
friend: 'Friends',
product: 'Marketplace Products',
other: 'Other'
};
//]]>
</script>
</body>
</html>