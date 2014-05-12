<html>
<head>
<link rel="stylesheet" href="../assets/css/login/toolkit.css" />
<link rel="stylesheet" href="../assets/css/login/responsive.css" />
<link rel="stylesheet" href="../assets/css/login/button.css" />
<link rel="stylesheet" href="../assets/css/login/global/global.css" />
<link rel="stylesheet" href="../assets/css/login/main_bam.css" />
<script src="../assets/js/third-party.js"></script>
<script src="../assets/js/core.js"></script>
<script>
			var targetOrigin = "<?php echo $cms_add; ?>";

			function updateParent(action, key, value) {
				var obj = { action: action };

				if (key) obj[key] = value;

				parent.postMessage(JSON.stringify(obj), targetOrigin);
				return false;
			}

			function checkDefaultValue(input, isPass) {
				if (input.value == input.title)
					input.value = "";

				if (isPass)
					input.type = "password";
			}
		</script>
	</head>
  <body>
    <div id="embedded-login">
	<center><h1 class="heading-3-shop-logo"><a href="#">FlameCMS<span class="beta-tag"></span></a></h1>
    <br /></center>
	<a id="embedded-close" href="javascript:;" onclick="updateParent('close')"> </a>
  <?php
  
  if(!isset($_SESSION['username'])){
  if(isset($_POST['accountName'])){
    $accountName = mysql_real_escape_string($_POST['accountName']);
    $accountPass = mysql_real_escape_string($_POST['password']);

    $sha_pass_hash = sha1(strtoupper($accountName ) . ":" . strtoupper($accountPass));

    $db_setup = mysql_select_db($server_adb,$connection_setup)or die(mysql_error());
    $login_query = mysql_query("SELECT * FROM account WHERE username = UPPER('".$accountName."') AND sha_pass_hash = CONCAT('".$sha_pass_hash."')");
    $login = mysql_fetch_assoc($login_query);
    if($login&&!empty($accountName)){
      ?>
      <style type="text/css">
      .loader {
        width:24px;
        height:24px;
        background: url("static/images/loaders/canvas-loader.gif") no-repeat;
       }
      </style>
      <center>
      <p><h3>Success</h3></p>
	  <h3>Loading&#8230;</h3><br />
      <div class="loader"></div>
      
      <?php
        $_SESSION['username']=$accountName;
          echo '<meta http-equiv="refresh" content="2;"';
          echo 'Succesfully';
      ?>
      </center>
      <?php
    }else{
      ?>
      <style type="text/css">
      .loader {
        width:24px;
        height:24px;
        background: url("static/images/loaders/canvas-loader.gif") no-repeat;
       }
      </style>
      <center>
      <h3>Your Credentials are Incorrect.</h3><br />
      <div class="loader"></div>
      <meta http-equiv="refresh" content="2"/>
      </center>
      <?php
    }
    
    ?>
    
  <?php }else{ ?>
  <form action="?SSID:<?php echo @$sessionid; ?>" method="post">
    <div>
      <p><label for="accountName" class="label">Username</label>
      <input id="accountName" value="" name="accountName" maxlength="320" type="text" tabindex="1" class="input" /></p>
      <p><label for="password" class="label">Password</label>
      <input id="password" name="password" maxlength="16" type="password" tabindex="2" autocomplete="off" class="input"/></p>
      <p>
        <span id="remember-me">
          <label for="persistLogin">
            <input type="checkbox" checked="checked" name="persistLogin" value="true" id="persistLogin" />
            Remember me
          </label>
        </span>

        <input type="hidden" name="app" value="com-sc2"/>

        <button class="ui-button button" type="submit" data-text="Processing…">
		<span class="button-left">
		<span class="button-right">Log In</span>
		</span>
		</button>
      </p>
    </div>
  </form>
  <?php } }else{
    ?>
    <script>
    parent.postMessage("{\"action\":\"success\"}", "<?php echo $website['address']; ?>");
    </script>
    <?php
    echo "<h3><font color='green'>Success</font></h3>";
    
  } ?>
        <script type="text/javascript">
			$(function() {
				$("#ssl-trigger").click(function() {
					updateParent('onload', 'height', $(document).height() + 76);
					$("#thawteseal").show();
				});
				
				$("#help-links a").click(function() {
					updateParent('redirect', 'url', this.href);
					return false;
				});

				$('#accountName').focus();

				updateParent('onload', 'height', $(document).height());
			});
		</script>
	</form>
    </div>
  </body>
  </html>
