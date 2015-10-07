<!-- DO NOT TOUCH -->
<?php require_once('system/config.php');
$account->AccountLoginQuery();
?>
<html xml:lang="en-us" class="en-us">
<head xmlns:og="http://ogp.me/ns#" xmlns:fb="http://ogp.me/ns/fb#">
<script>window['adrum-start-time'] = new Date().getTime();</script>
<script type="text/javascript" src="<?php echo BASE_URL ?>assets/js/vendor/adrum.js"></script>
<meta http-equiv="imagetoolbar" content="false"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<title>Community - <?php echo TITLE ?></title>
<link rel="shortcut icon" href="<?php echo BASE_URL ?>assets/images/logos/favicon.png" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo BASE_URL ?>assets/css/common-game-site.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo BASE_URL ?>assets/css/wow.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo BASE_URL ?>assets/css/lightbox.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo BASE_URL ?>assets/css/community/community.css"/>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo BASE_URL ?>assets/css/cms.min.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo BASE_URL ?>assets/css/cms.css" />
<!-- Le Javascripts -->
<script type="text/javascript" src="<?php echo BASE_URL ?>assets/js/third-party.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL ?>assets/js/common-game-site.js"></script>
<!-- Le Core Code -->
<script type="text/javascript">
//<![CDATA[
var Core = Core || {},
Login = Login || {};
Core.staticUrl = '<?php echo BASE_URL ?>assets';
Core.sharedStaticUrl = '<?php echo BASE_URL ?>assets';
Core.baseUrl = '<?php echo BASE_URL ?>assets';
Core.projectUrl = '<?php echo BASE_URL ?>assets';
Core.project = 'FlameCMS';
Core.locale = 'en-gb';
Core.language = 'en';
Core.region = 'ww';
Core.shortDateFormat = 'dd/MM/yyyy';
Core.dateTimeFormat = 'dd/MM/yyyy HH:mm';
Core.loggedIn = false;
Core.userAgent = 'web';
Login.embeddedUrl = '<?php echo BASE_URL ?>webkit/loginframe.php';
var Flash = Flash || {};
Flash.videoPlayer = 'http://media.blizzard.com/global-video-player/themes/wow/video-player.swf';
Flash.ratingImage = 'http://media.blizzard.com/global-video-player/ratings/wow/en-gb.jpg';
Flash.expressInstall = 'http://media.blizzard.com/global-video-player/expressInstall.swf';
//]]>
</script>
</head>
<body class="en-us community-home">
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
$page = "menu-community";
include(WEBKIT.'menu.php');
include(WEBKIT.'userplate.php');?>
</div>
<!-- Header END -->
</div>
	<div id="content">
		<div class="content-top body-top">
			<div class="content-trail">
				<ol class="ui-breadcrumb">
					<li itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
					<a href="http://us.battle.net/wow/en/" rel="np" class="breadcrumb-arrow" itemprop="url">
					<span class="breadcrumb-text" itemprop="name">World of Warcraft</span>
					</a>
					</li>
					<li class="last" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
					<a href="index.html" rel="np" itemprop="url">
					<span class="breadcrumb-text" itemprop="name">Community</span>
					</a>
					</li>
				</ol>
			</div>
			<div class="content-bot clear">
				<script type="text/javascript">
		//<![CDATA[
		$(document).ready(function(){
			Input.bind('#wowcharacter');
			Input.bind('#wowguild');
		});
		//]]>
		</script>
				<div id="left">
					<div class="profiles">
						<h4>Community</h4>
						<div class="profiles-section">
							<div class="sidebar-module " id="sidebar-profiles-search">
								<div class="sidebar-title">
									<h3 class="header-3 title-profiles-search">
									Profiles </h3>
								</div>
								<div class="sidebar-content">
									<div class="profiles-search-block">
										<span class="profiles-search-title">Character</span>
										<form action="#" method="get">
											<input type="hidden" name="f" value="wowcharacter"/>
											<input type="text" id="wowcharacter" alt="Name" name="q"/>
											<button class="ui-button button1" type="submit"><span class="button-left"><span class="button-right">Search</span></span></button>
										</form>
									</div>
									<div class="profiles-search-block">
										<span class="profiles-search-title">Guild</span>
										<form action="#" method="get">
											<input type="hidden" name="f" value="wowguild"/>
											<input type="text" id="wowguild" alt="Name" name="q"/>
											<button class="ui-button button1" type="submit"><span class="button-left"><span class="button-right">Search</span></span></button>
										</form>
									</div>
								</div>
							</div>
							<p class="profiles-tip">
								Tip: Log in to quickly access your profile.
							</p>
							<span class="clear">
							<!-- -->
							</span>
						</div>
					</div>
					<div class="main-feature">
						<div class="main-feature-wrapper">
							<div class="sidebar-module " id="sidebar-leaderboards">
								<div class="sidebar-title">
									<h3 class="header-3 title-leaderboards">
									Leaderboards </h3>
								</div>
								<div class="sidebar-content">
									<div id="challenge-mode" class="leaderboard-content-block">
										<a href="#" class="leaderboard-content-title">Challenge Mode</a>
										<span class="leaderboard-content-desc">View the fastest times for each dungeon and realm!</span>
										<div class="group">
											<a href="#">
											<span class="group-thumbnail thumb-skyreach"></span>
											<span class="group-name">Skyreach</span>
											<span class="clear">
											<!-- -->
											</span>
											</a>
											<a href="#">
											<span class="group-thumbnail thumb-bloodmaul-slag-mines"></span>
											<span class="group-name">Bloodmaul Slag Mines</span>
											<span class="clear">
											<!-- -->
											</span>
											</a>
											<a href="#">
											<span class="group-thumbnail thumb-auchindoun"></span>
											<span class="group-name">Auchindoun</span>
											<span class="clear">
											<!-- -->
											</span>
											</a>
											<a href="#">
											<span class="group-thumbnail thumb-shadowmoon-burial-grounds"></span>
											<span class="group-name">Shadowmoon Burial Grounds</span>
											<span class="clear">
											<!-- -->
											</span>
											</a>
											<a href="#">
											<span class="group-thumbnail thumb-grimrail-depot"></span>
											<span class="group-name">Grimrail Depot</span>
											<span class="clear">
											<!-- -->
											</span>
											</a>
											<a href="#">
											<span class="group-thumbnail thumb-upper-blackrock-spire"></span>
											<span class="group-name">Upper Blackrock Spire</span>
											<span class="clear">
											<!-- -->
											</span>
											</a>
											<a href="#">
											<span class="group-thumbnail thumb-the-everbloom"></span>
											<span class="group-name">The Everbloom</span>
											<span class="clear">
											<!-- -->
											</span>
											</a>
											<a href="#">
											<span class="group-thumbnail thumb-iron-docks"></span>
											<span class="group-name">Iron Docks</span>
											<span class="clear">
											<!-- -->
											</span>
											</a>
										</div>
									</div>
									<div id="pvp-ladder" class="leaderboard-content-block">
										<a href="#" class="leaderboard-content-title">Player vs. Player</a>
										<span class="leaderboard-content-desc">View the current Rated Battleground and Arena ladders.</span>
										<div class="group">
											<a href="#">
											<span class="group-thumbnail thumb-battlegrounds"></span>
											<span class="group-name">Battlegrounds </span>
											<span class="clear">
											<!-- -->
											</span>
											</a>
											<a href="#">
											<span class="group-thumbnail thumb-arena-2v2"></span>
											<span class="group-name">Arena 2v2 </span>
											<span class="clear">
											<!-- -->
											</span>
											</a>
											<a href="#">
											<span class="group-thumbnail thumb-arena-3v3"></span>
											<span class="group-name">Arena 3v3 </span>
											<span class="clear">
											<!-- -->
											</span>
											</a>
											<a href="#">
											<span class="group-thumbnail thumb-arena-5v5"></span>
											<span class="group-name">Arena 5v5 </span>
											<span class="clear">
											<!-- -->
											</span>
											</a>
										</div>
									</div>
									<span class="clear">
									<!-- -->
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="right">
					<div class="sidebar-module " id="sidebar-auction-house">
						<div class="sidebar-title">
							<h3 class="header-3 title-auction-house">
							Auction House </h3>
						</div>
						<div class="sidebar-content">
							<ul>
								<li>
								<a href="#" class="web-auction-house block">
								<span class="content-icon"></span>
								<span class="content-title">Web Auction House</span>
								<span class="content-desc">Browse, buy, and sell on the web!</span>
								<span class="clear">
								<!-- -->
								</span>
								</a>
								</li>
								<li>
								<a href="#" class="mobile-armory block">
								<span class="content-icon"></span>
								<span class="content-title">Mobile App</span>
								<span class="content-desc">Access the auction house, guild chat, and character profiles from your phone.</span>
								<span class="clear">
								<!-- -->
								</span>
								</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="sidebar-module " id="sidebar-game-realms">
						<div class="sidebar-title">
							<h3 class="header-3 title-game-realms">
							Game Realms </h3>
						</div>
						<div class="sidebar-content">
							<ul>
								<li>
								<a href="#" class="realm-status block">
								<span class="content-icon"></span>
								<span class="content-title">Realm Status</span>
								<span class="content-desc">See a list of all available World of Warcraft realms as well as the status of each.</span>
								<span class="clear">
								<!-- -->
								</span>
								</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="sidebar-module " id="sidebar-blizzard-community">
						<div class="sidebar-title">
							<h3 class="header-3 title-blizzard-community">
							Blizzard Community Content </h3>
						</div>
						<div class="sidebar-content">
							<ul>
								<li>
								<a href="#" class="contests block" target="_blank">
								<span class="content-icon"></span>
								<span class="content-title">Contests</span>
								<span class="content-desc">Past and present contests for you to check out and participate in!</span>
								<span class="clear">
								<!-- -->
								</span>
								</a>
								</li>
							</ul>
						</div>
					</div>
					<span class="clear">
					<!-- -->
					</span>
				</div>
				<span class="clear">
				<!-- -->
				</span>
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

<script type="text/javascript" src="<?php echo BASE_URL ?>assets/js/utility/slideshow.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL ?>assets/js/cms.min.js"></script>
</body>
</html>