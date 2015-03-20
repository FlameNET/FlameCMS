<!-- Sidebar -->
<div class="right-sidebar">
	<!-- Advertisements -->
	<div id="sidebar-marketing" class="sidebar-module">
	<div class="bnet-offer">
	<div class="bnet-offer-bg">
		<a href="#" target="_blank" id="#" class="bnet-offer-image">
		<img src="//bnetcmsus-a.akamaihd.net/cms/ad_300x250/32WKK501BM5G1384352523717.jpg" width="300" height="250" alt="" />
		</a>
	</div>
	</div>
	</div>
	<!-- Advertisements END -->
<div class="sidebar" id="sidebar">
	<div class="sidebar-top">
	<div class="sidebar-bot">
	<!--
	<div id="sidebar-links" class="promo-ad">
		<a href="http://www.blizzard.com/gamescom" onclick="window.open(this.href); return false;" class="promo-gamescom2013">
		Gamescom 2013
		</a>
	</div>
	<img width="1" height="1" style="border:0" src="HTTPS://bs.serving-sys.com/BurstingPipe/ActivityServer.bs?cn=as&amp;ActivityID=417046&amp;ns=1" />
	-->
<div class="sidebar-module " id="sidebar-social-media">
	<div class="sidebar-title">
		<h3 class="header-3 title-social-media">
		<?php echo $cms_lang['1'] ?>
		</h3>
	</div>
<div class="sidebar-content">
	<ul class="social-media">
		<li class="atom-feed">
		<a href="#" target="_blank"></a>
		</li>
		<li class="facebook">
		<a href="<?php echo FACEBOOK ?>" title="<?php echo TITLE ?> <?php echo $cms_lang['11']; ?> Facebook"></a>
		</li>
		<li class="twitter">
		<a href="<?php echo TWITTER ?>" title="<?php echo TITLE ?> <?php echo $cms_lang['11']; ?> Twitter"></a>
		</li>
		<li class="youtube">
		<a href="<?php echo YOUTUBE ?>" title="<?php echo TITLE ?> <?php echo $cms_lang['11']; ?> Youtube"></a>
		</li>
		<li class="reddit">
		<a href="<?php echo REDDIT ?>" title="<?php echo TITLE ?> <?php echo $cms_lang['11']; ?> reddit"></a>
		</li>
	<span class="clear"><!-- --></span>
	</ul>
</div>
</div>
<div id="fb-root"></div>
<div id="dynamic-sidebar-target"><div class="sidebar-module " id="sidebar-expansion" style="">
<div class="sidebar-title">
<h3 class="header-3 title-expansion">
	<a href="#"><?php echo $cms_lang['2']; ?></a>
</h3>
</div>
<div class="sidebar-content">
<a href="#" class="sidebar-expansion"></a>
<ul id="expansion" class="trending-topics">
<ul>
<li><a href="#"><?php echo $cms_lang['3']; ?></a></li>
<li><a href="#"><?php echo $cms_lang['4']; ?></a></li>
<li><a href="#"><?php echo $cms_lang['5']; ?></a></li>
<li><a href="#"><?php echo $cms_lang['6']; ?></a></li>
<li><a href="#"><?php echo $cms_lang['7']; ?></a></li>
</ul>
</ul>
</div>
</div>
<div class="sidebar-module " id="sidebar-under-dev" style="">
<div class="sidebar-title">
<h3 class="header-3 title-under-dev">
<a href="#"><?php echo $cms_lang['8']; ?></a>
</h3>
</div>
<div class="sidebar-content">
<a href="#" class="latest-patch"></a>
</div>
</div>
<?php include(__WEBKIT__.'screenshot.php'); ?>
<?php include(__WEBKIT__.'latestpost.php'); ?>
</div>
</div>
</div>
</div>
<script type="text/javascript">
//<![CDATA[
	$(function() {
		Sidebar.sidebar([
			{ "type": "expansion", "query": "" },
			{ "type": "under-dev", "query": "" },
			{ "type": "sotd", "query": "" },
			{ "type": "blizzard-posts", "query": "" }
		]);
	});
//]]>
</script>
</div>
<!-- Sidebar END -->