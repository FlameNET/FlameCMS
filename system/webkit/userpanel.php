<div id="service">
<ul class="service-bar">
<li class="service-cell service-home">
<a href="<?php echo BASE_URL ?>" tabindex="50" accessKey="1" title="<?php echo TITLE ?> HOME" data-action="<?php echo TITLE ?> HOME">&nbsp;</a>
</li>
<?php if(isset($_SESSION['email'])){ ?>
<li class="service-cell service-welcome">
	Welcome, <?php echo isset($profile['first_name']) ? $profile['first_name'] : null ; ?> |  <a href="<?php echo ACCOUNT_URL ?>signout" tabindex="50" accesskey="2">log out</a>
</li>
<?php
}else{
?>
<li class="service-cell service-welcome">
<a href="<?php echo ACCOUNT_URL ?>login.php">Log in</a> or <a href="<?php echo ACCOUNT_URL ?>register">Create an Account</a>
</li>
<?php
}
?>
<li class="service-cell service-shop">
<a href='<?php echo BASE_URL ?>shop/' class="service-link" data-action="Shop">Shop</a>
</li>
<li class="service-cell service-account">
<a href='<?php echo ACCOUNT_URL ?>/management/' class="service-link" tabindex="50" accesskey="3" data-action="Account">Account</a>
</li>
<li class="service-cell service-support service-support-enhanced">
<a href="#support" class="service-link service-link-dropdown" tabindex="50" accesskey="4" id="support-link" onclick="return false" style="cursor: progress" rel="javascript" data-action="Support - Support">Support<span class="no-support-tickets" id="support-ticket-count"></span></a>
<div class="support-menu" id="support-menu" style="display:none;">
<div class="support-primary">
<ul class="support-nav">
<li>
<a href="#" tabindex="55" class="support-category" id="support-nav-kb" data-action="Support - Knowledge Center">
<strong class="support-caption">Knowledge Center</strong>
Browse our support articles
</a>
</li>
<li>
<a href="#" tabindex="55" class="support-category" id="support-nav-tickets" data-action="Support - Your Support Tickets">
<strong class="support-caption">Your Support Tickets</strong>
View your active tickets (login required).
</a>
</li>
</ul>
<span class="clear"><!-- --></span>
</div>
<div class="support-secondary"></div>
<!--[if IE 6]> <iframe id="support-shim" src="javascript:false;" frameborder="0" scrolling="no" style="display: block; position: absolute; top: 0; left: 9px; width: 297px; height: 400px; z-index: -1;"></iframe>
<script type="text/javascript">
//<![CDATA[
(function(){
var doc = document;
var shim = doc.getElementById('support-shim');
shim.style.filter = 'progid:DXImageTransform.Microsoft.Alpha(style=0,opacity=0)';
shim.style.display = 'block';
})();
//]]>
</script>
<![endif]-->
</div>
</li>
<li class="service-cell service-explore">
<a href="#explore" tabindex="50" accesskey="5" class="dropdown" id="explore-link" onclick="return false" style="cursor: progress" rel="javascript" data-action="Explore - Explore">Explore</a>
<div class="explore-menu" id="explore-menu" style="display:none;">
<div class="explore-primary">
<ul class="explore-nav">
<li>
<a href="<?php echo BASE_URL ?>" tabindex="55" data-action="Explore - Flame.net Home">
<strong class="explore-caption">Flame.net Home</strong>
</a>
</li>
<li>
<a href="<?php echo BASE_URL ?>shop/" tabindex="55" data-action="Explore - Shop">
<strong class="explore-caption">Shop</strong>
</a>
</li>
<li>
<a href="<?php echo ACCOUNT_URL ?>management/" tabindex="55" data-action="Explore - Account">
<strong class="explore-caption">Account</strong>
</a>
</li>
<li>
<a href="<?php echo BASE_URL ?>support/" tabindex="55" data-action="Explore - Support">
<strong class="explore-caption">Support</strong>
</a>
</li>
</ul>
<div class="explore-links">
<h2 class="explore-caption">More</h2>
<ul>
<li><a href="#" tabindex="55" data-action="Explore - What is Flame.net?">What is Flame.net?</a></li>
<li><a href="#" tabindex="55" data-action="Explore - What is Real ID?">What is Real ID?</a></li>
<li><a href="#" tabindex="55" data-action="Explore - Parental Controls">Parental Controls</a></li>
<li><a href="#" tabindex="55" data-action="Explore - Account Security">Account Security</a></li>
<li><a href="#" tabindex="55" data-action="Explore - Work At Blizzard">Work At Blizzard</a></li>
<li><a href="#" tabindex="55" data-action="Explore - Classic Games">Classic Games</a></li>
<li><a href="#" tabindex="55" data-action="Explore - Account Support">Account Support</a></li>
</ul>
</div>
<span class="clear"><!-- --></span>
<!--[if IE 6]> <iframe id="explore-shim" src="javascript:false;" frameborder="0" scrolling="no" style="display: block; position: absolute; top: 0; left: 9px; width: 409px; height: 400px; z-index: -1;"></iframe>
<script type="text/javascript">
//<![CDATA[
(function(){
var doc = document;
var shim = doc.getElementById('explore-shim');
shim.style.filter = 'progid:DXImageTransform.Microsoft.Alpha(style=0,opacity=0)';
shim.style.display = 'block';
})();
//]]>
</script>
<![endif]-->
</div>
<ul class="explore-secondary">
<!--<li class="explore-game explore-game-wow">
<a href="http://eu.Flame.net/wow/" tabindex="55" data-action="Explore - wow">
<span class="explore-game-inner">
<strong class="explore-caption">World of Warcraft</strong>
</span>
</a>
</li>
<li class="explore-game explore-game-d3">
<a href="http://eu.Flame.net/d3/" tabindex="55" data-action="Explore - d3">
<span class="explore-game-inner">
<strong class="explore-caption">Diablo III</strong>
</span>
</a>
</li>
<li class="explore-game explore-game-sc2">
<a href="http://eu.Flame.net/sc2/" tabindex="55" data-action="Explore - sc2">
<span class="explore-game-inner">
<strong class="explore-caption">StarCraft® II</strong>
</span>
</a>
</li>
<li class="explore-game explore-game-hs">
<a href="http://eu.Flame.net/hearthstone/" tabindex="55" data-action="Explore - hs">
<span class="explore-game-inner">
<strong class="explore-caption">Hearthstone™</strong>
</span>
</a>
</li>
<li class="explore-game explore-game-heroes">
<a href="http://www.heroesofthestorm.com/en-gb" tabindex="55" data-action="Explore - heroes">
<span class="explore-game-inner">
<strong class="explore-caption">Heroes of the Storm™</strong>
</span>
</a>
</li>-->
</ul>
</div>
</li>
</ul>
<div id="warnings-wrapper">
<!--[if lt IE 8]> <div id="browser-warning" class="warning warning-red">
<div class="warning-inner2">
You are using an outdated web browser.<br />
<a href="http://eu.blizzard.com/support/article/browserupdate">Upgrade</a> or <a href="http://www.google.com/chromeframe/?hl=en-GB" id="chrome-frame-link">install Google Chrome Frame</a>.
<a href="#close" class="warning-close" onclick="App.closeWarning('#browser-warning', 'browserWarning'); return false;"></a>
</div>
</div>
<![endif]-->
<!--[if lt IE 8]> <script type="text/javascript" src="assets/js/third-party/CFInstall.min.js?v=58"></script>
<![endif]-->
<noscript>
<div id="javascript-warning" class="warning warning-red">
<div class="warning-inner2">
JavaScript must be enabled to use this site.
</div>
</div>
</noscript>
</div>
</div>