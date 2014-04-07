<!-- DO NOT TOUCH -->
<?php require_once('webkit/config'); ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" class="en-gb">
<head xmlns:og="http://ogp.me/ns#" xmlns:fb="http://ogp.me/ns/fb#">
<meta http-equiv="imagetoolbar" content="false" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<!-- YOU CAN TOUCH NOW -->
<!-- (If you know what you're doing) -->
<!-- Description of CMS -->
<?php include('webkit/desc'); ?>
<!-- Description of CMS END -->
<title>FlameCMS</title>
<!-- The Styles & Javascripts of the CMS -->
<?php include('webkit/core'); ?>
<!-- The Styles & Javascripts of the CMS END -->
</head>
<body class="en-gb homepage news">
<div id="wrapper">
<!-- User Panel -->
<?php include('webkit/usrpanel'); ?>
<!-- User Panel END -->
<div id="header">
<!-- Search -->
<?php include('webkit/search'); ?>
<!-- Search END -->
<h1 id="logo"><a href="/wow/en/"><?php echo $cms['title']; ?></a></h1>
<!-- Header -->
<?php include('webkit/header'); ?>
<!-- Header END -->
</div>
<div id="content">
<div class="content-top body-top">
<!-- Content Trail -->
<?php include('webkit/breadcrumb'); ?>
<!-- Content Trail END -->
<div class="content-bot clear">
<!-- Slideshow -->
<?php include('webkit/slideshow'); ?>
<!-- Slideshow END -->
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
		<?php echo $cms_lang['1']; ?>
		</h3>
	</div>
<div class="sidebar-content">
	<ul class="social-media">
		<li class="atom-feed">
		<a href="#" target="_blank"></a>
		</li>
		<li class="facebook">
		<a href="<?php echo $cms['Facebook']; ?>" title="<?php echo $cms['title']; ?> on Facebook"></a>
		</li>
		<li class="twitter">
		<a href="<?php echo $cms['Twitter']; ?>" title="<?php echo $cms['title']; ?> on Twitter"></a>
		</li>
		<li class="youtube">
		<a href="<?php echo $cms['Youtube']; ?>" title="<?php echo $cms['title']; ?> on Youtube"></a>
		</li>
		<li class="reddit">
		<a href="<?php echo $cms['Reddit']; ?>" title="<?php echo $cms['title']; ?> on reddit"></a>
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
<?php include('webkit/screenshot'); ?>
<?php include('webkit/latestpost'); ?>
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
<div class="left-content" itemscope="itemscope" itemtype="http://schema.org/WebPageElement">
<div class= "left-content-inner">
<div class="featured-news-container">
<ul class="featured-news">
<!-- Featured News -->
<?php include('webkit/featuresnews'); ?>
</ul>
</div>
<span class="clear"><!-- --></span>
<!-- Featured News END -->
<!-- Articles -->
<?php include('webkit/articles'); ?>
<!-- Articles END -->
<span class="clear"><!-- --></span>
<div class="blog-load-more">
<a class="load-more" id="load-more" href="javascript:;">Load more</a>
<span class="clear"><!-- --></span>
</div>
</div>
</div>
<span class="clear"><!-- --></span>
<script type="text/javascript">
//<![CDATA[
$(function(){
		Blog.init({
			loadMore: true,
			loadMorePath: "/wow/en/blog/infinite",
			loadMoreArticleTarget: "#blog-articles",
			loadMoreArticleType: "blog",
			loadMoreArticleLimit: 11
		});
	});
//]]>
</script>
</div>
</div>
</div>
<?php include('webkit/footer'); ?>
</div>
<script>
//<![CDATA[
var xsToken = '';
var supportToken = '';
var jsonSearchHandlerUrl = '//eu.Flame.net';
var Msg = Msg || {};
Msg.support = {
ticketNew: 'Ticket {0} was created.',
ticketStatus: 'Ticket {0}’s status changed to {1}.',
ticketOpen: 'Open',
ticketAnswered: 'Answered',
ticketResolved: 'Resolved',
ticketCanceled: 'Cancelled',
ticketArchived: 'Archived',
ticketInfo: 'Need Info',
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
<script type="text/javascript" src="assets/js/menu.js"></script>
<script type="text/javascript" src="assets/js/wow.js"></script>
<script type="text/javascript" src="assets/js/search-pane.js"></script>
<script type="text/javascript">
//<![CDATA[
$(function() {
Menu.initialize('assets/data/menu.json');
});
//]]>
</script>
<script type="text/javascript" src="assets/js/cms.min.js"></script>
</body>
</html>