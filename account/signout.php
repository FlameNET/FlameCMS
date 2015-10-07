<?php
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
<title>Sign Out <?php echo TITLE ?></title>
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
Core.baseUrl = 'account';
Core.projectUrl = 'account';
Core.cdnUrl = 'http://media.blizzard.com/';
Core.supportUrl = 'support/';
Core.secureSupportUrl = 'support/';
Core.project = 'bam';
Core.locale = 'en-gb';
Core.language = 'en';
Core.region = 'eu';
Core.shortDateFormat = 'dd/MM/yyyy';
Core.dateTimeFormat = 'dd/MM/yyyy HH:mm';
Core.loggedIn = false;
Core.userAgent = 'web';
Login.embeddedUrl = '<?php echo BASE_URL ?>webkit/loginframe.php';
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
					<h2><a href="<?php echo BASE_URL ?>#"> <?php echo $cms_lang['13']; ?>
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
			<center>
				<p class="text-green title"><strong>Sign Out</strong></p>
			</center>
            <?php session_unset(); session_destroy(); ?>
			<meta http-equiv="refresh" content="3;url=<?php echo BASE_URL ?>"/>
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
postDelete: "Are you sure you want to delete this post?",
throttleError: "You must wait before you can post again."
};
Msg.bml= {
validationError: 'A required field is incomplete',
characterExceed: 'The post body exceeds XXXXXX characters.',
searchFor: "Search for",
searchTags: "Articles tagged:",
characterAjaxError: "You may have become logged out. Please refresh the page and try again.",
ilvl: "Level {0}",
shortQuery: "Search requests must be at least three characters long.",
editSuccess: "Success. Reload?",
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