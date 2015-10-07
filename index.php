<?php 
//DO NOT TOUCH!
require_once('system/config.php');
$account->AccountLoginQuery();
?>
<html xml:lang="en-gb" class="en-gb">
<head xmlns:og="http://ogp.me/ns#" xmlns:fb="http://ogp.me/ns/fb#">
<meta http-equiv="imagetoolbar" content="false" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<!-- YOU CAN TOUCH NOW -->
<!-- (If you know what you're doing) -->
<!-- Description of CMS -->
<?php include(WEBKIT.'desc.php'); ?>
<!-- Description of CMS END -->
<title><?php echo TITLE ?></title>
<!-- The Styles & Javascripts of the CMS -->
<?php include(WEBKIT.'core.php'); ?>
<!-- The Styles & Javascripts of the CMS END -->
</head>
<body class="en-gb homepage news">
<div id="wrapper">
<!-- User Panel -->
<?php include(WEBKIT.'userpanel.php'); ?>
<!-- User Panel END -->
<div id="header">
<!-- Search -->
<?php include(WEBKIT.'search.php'); ?>
<!-- Search END -->
<h1 id="logo"><a href="<?php echo BASE_URL ?>"><?php echo TITLE ?></a></h1>
<!-- Header -->
<div class="header-plate">
<?php
$page = "menu-home";
include(WEBKIT.'menu.php');
include(WEBKIT.'userplate.php');?>
</div>
<!-- Header END -->
</div>
<div id="content">
<div class="content-top body-top">
<!-- Content Trail -->
<?php include(WEBKIT.'breadcrumb.php'); ?>
<!-- Content Trail END -->
<div class="content-bot clear">
<!-- Slideshow -->
<?php include(WEBKIT.'slideshow.php'); ?>
<!-- Slideshow END -->
<!-- Sidebar -->
<?php include (WEBKIT.'sidebar.php'); ?>
<!-- Sidebar END -->
<div class="left-content" itemscope="itemscope" itemtype="http://schema.org/WebPageElement">
<div class= "left-content-inner">
<div class="featured-news-container">
<ul class="featured-news">
<!-- Featured News -->
<?php include(WEBKIT.'featuresnews.php'); ?>
</ul>
</div>
<span class="clear"><!-- --></span>
<!-- Featured News END -->
<!-- Articles -->
<?php include(WEBKIT.'articles.php'); ?>
<!-- Articles END -->
<span class="clear"><!-- --></span>
<?php
$pageQuery	= $connect->WebQuery("SELECT * FROM news WHERE id");
$pageNumber	= mysqli_num_rows($pageQuery) > 10;
if($pageNumber){
?>
<div class="blog-load-more">
<a class="load-more" id="load-more" href="javascript:;"><?php echo $cms_lang['10']; ?></a>
<span class="clear"><!-- --></span>
</div>
<?php
}
?>
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
<?php footer(); ?>
</div>
<script>
//<![CDATA[
var xsToken = '';
var supportToken = '';
var jsonSearchHandlerUrl = '<?php echo BASE_URL ?>';
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
<script type="text/javascript" src="<?php echo BASE_URL ?>assets/js/menu.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL ?>assets/js/wow.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL ?>assets/js/search-pane.js"></script>
<script type="text/javascript">
//<![CDATA[
$(function() {
Menu.initialize('assets/data/menu.json');
});
//]]>
</script>
<script type="text/javascript" src="<?php echo BASE_URL ?>assets/js/cms.min.js"></script>
</body>
</html>
