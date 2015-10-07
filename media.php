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
<title>Media - <?php echo TITLE ?></title>
<link rel="shortcut icon" href="<?php echo BASE_URL ?>assets/images/logos/favicon.png" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo BASE_URL ?>assets/css/common-game-site.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo BASE_URL ?>assets/css/wow.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo BASE_URL ?>assets/css/lightbox.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo BASE_URL ?>assets/css/media/media-gallery.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo BASE_URL ?>assets/css/media/media.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo BASE_URL ?>assets/css/locale/en-gb.css" />
<!-- Le Javascripts -->
<script type="text/javascript" src="<?php echo BASE_URL ?>assets/js/third-party.js?v=58-65"></script>
<script type="text/javascript" src="<?php echo BASE_URL ?>assets/js/common-game-site.js?v=58-65"></script>
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
<body class="en-us media-home">
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
$page = "menu-media";
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
<a href="/wow/en/" rel="np" class="breadcrumb-arrow" itemprop="url">
<span class="breadcrumb-text" itemprop="name">World of Warcraft</span>
</a>
</li>
<li class="last" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
<a href="/wow/en/media/" rel="np" itemprop="url">
<span class="breadcrumb-text" itemprop="name">Media</span>
</a>
</li>
</ol>
</div>
<div class="content-bot clear"> <div class="media-content">
<div id="media-index">
<div class="media-index-section float-left">
<a class="gallery-title videos" href="videos">
<span class="view-all"><span class="arrow"></span>All Videos</span>
<span class="gallery-icon"></span>
Videos <span class="total">(48)</span>
</a>
<div class="section-content">
<a href="videos/?view#/warlords-of-draenor-wish-you-were-here" class="thumb-wrapper video-thumb-wrapper first-video">
<span class="video-info">
<span class="video-title">Warlords of Draenor Trailer: Wish You Were Here </span>
<span class="video-desc">Wish You Were Here </span>
<span class="date-added">Date Added: 10/03/2014</span>
</span>
<span class="thumb-bg" style="background-image:url(http://media.blizzard.com/wow/media/videos/warlords-of-draenor-wish-you-were-here/warlords-of-draenor-wish-you-were-here-index-thumb.jpg)">
<span class="thumb-frame"></span>
</span>
</a>
<a href="videos/?view#/warlords-of-draenor-character-boost" class="thumb-wrapper video-thumb-wrapper">
<span class="video-info">
<span class="video-title">Warlords of Draenor Pre-Purchase Character Boost Tutorial </span>
<span class="video-desc">Character Boost</span>
<span class="date-added">Date Added: 10/03/2014</span>
</span>
<span class="thumb-bg" style="background-image:url(http://media.blizzard.com/wow/media/videos/warlords-of-draenor-character-boost/warlords-of-draenor-character-boost-index-thumb.jpg)">
<span class="thumb-frame"></span>
</span>
</a>
<span class="clear"><!-- --></span>
</div>
<span class="clear"><!-- --></span>
</div>
<div class="media-index-section float-right">
<a class="gallery-title screenshots" href="screenshots">
<span class="view-all"><span class="arrow"></span>All Screenshots</span>
<span class="gallery-icon"></span>
Screenshots <span class="total">(4,919)</span>
</a>
<div class="section-content">
<a class="thumb-wrapper left-col" href="screenshotsscreenshot-of-the-day/warlords-of-draenor#/1">
<span class="thumb-bg" style="background-image:url(http://media.blizzard.com/wow/media/screenshots/screenshot-of-the-day/warlords-of-draenor/warlords-of-draenor-ss0152-index-thumb.jpg)">
<span class="thumb-frame"></span>
</span>
<span class="date-added">Date Added: 10/10/2014</span>
</a>
<a class="thumb-wrapper" href="screenshotswarlords-of-draenor#/1">
<span class="thumb-bg" style="background-image:url(http://media.blizzard.com/wow/media/screenshots/screenshot-of-the-day/mists-of-pandaria/mists-of-pandaria-ss0573-index-thumb.jpg)">
<span class="thumb-frame"></span>
</span>
<span class="date-added">Date Added: 18/03/2014</span>
</a>
<a class="thumb-wrapper left-col bottom-row" href="screenshotstransmog/">
<span class="thumb-bg" style="background-image:url(http://media.blizzard.com/wow/media/screenshots/transmog/nightelves/nightelf-female036-index-thumb.jpg)">
<span class="thumb-frame"></span>
</span>
<span class="date-added">Date Added: 21/02/2012</span>
</a>
<a class="thumb-wrapper bottom-row" href="screenshotsraces?keywords=pandaren">
<span class="thumb-bg" style="background-image:url(http://media.blizzard.com/wow/media/screenshots/races/pandaren12-index-thumb.jpg)">
<span class="thumb-frame"></span>
</span>
<span class="date-added">Date Added: 21/03/2013</span>
</a>
<span class="clear"><!-- --></span>
</div>
<span class="clear"><!-- --></span>
</div>
<span class="clear"><!-- --></span>
<div class="media-index-section float-left">
<a href="http://eu.blizzard.com/en-gb/games/music/index.html" class="gallery-title music" target="_blank">
<span class="view-all">
<span class="arrow"></span>
View All
</span>
<span class="gallery-icon"></span>
Music
<span class="total"></span>
</a>
<div class="section-content">
<a class="music-thumb-wrapper" href="http://us.blizzard.com/en-us/games/music/wow-mists-of-pandaria.html" target="_blank">
<span class="album-thumb album-1"></span>
<span class="album-title">World of Warcraft: Mists of Pandaria <em>(Original Game Soundtrack)</em></span>
<span class="date-added">9/25/2012</span>
</a>
<span class="clear"><!-- --></span>
<a class="music-thumb-wrapper" href="http://eu.blizzard.com/en-gb/games/music/wow-cataclysm.html" target="_blank">
<span class="album-thumb album-2"></span>
<span class="album-title">World of Warcraft: Cataclysm <em>(Original Game Soundtrack)</em></span>
<span class="date-added">12/07/2010</span>
</a>
<span class="clear"><!-- --></span>
</div>
</div>
<div class="media-index-section float-right">
<a class="gallery-title wallpapers" href="wallpapers">
<span class="view-all"><span class="arrow"></span>All Wallpapers</span>
<span class="gallery-icon"></span>
Wallpapers <span class="total">(274)</span>
</a>
<div class="section-content">
<a class="thumb-wrapper left-col" href="wallpapersother?view#/warlords-of-draenor">
<span class="thumb-bg" style="background-image:url(http://media.blizzard.com/wow/media/wallpapers/other/warlords-of-draenor/warlords-of-draenor-index-thumb.jpg)">
<span class="thumb-frame"></span>
</span>
<span class="date-added">Date Added: 19/11/2014</span>
</a>
<a class="thumb-wrapper" href="wallpapersfan-art?view#/wallpaper34">
<span class="thumb-bg" style="background-image:url(http://media.blizzard.com/wow/media/wallpapers/fan-art/wallpaper34/wallpaper34-index-thumb.jpg)">
<span class="thumb-frame"></span>
</span>
<span class="date-added">Date Added: 16/10/2014</span>
</a>
<span class="clear"><!-- --></span>
</div>
<span class="clear"><!-- --></span>
</div>
<span class="clear"><!-- --></span>
<div class="media-index-section float-left">
<a class="gallery-title artwork" href="artwork">
<span class="view-all"><span class="arrow"></span>All Artwork</span>
<span class="gallery-icon"></span>
Artwork <span class="total">(2,535)</span>
</a>
<div class="section-content">
<a class="thumb-wrapper left-col" href="artworkwow-warlords-of-draenor">
<span class="thumb-bg" style="background-image:url(http://media.blizzard.com/wow/media/artwork/wow-warlords-of-draenor/wowx5-artwork-049-index-thumb.jpg)">
<span class="thumb-frame"></span>
</span>
<span class="date-added">Date Added: 20/01/2015</span>
</a>
<a class="thumb-wrapper" href="artworkwow-warlords-of-draenor">
<span class="thumb-bg" style="background-image:url(http://media.blizzard.com/wow/media/artwork/wow-warlords-of-draenor/wowx5-artwork-050-index-thumb.jpg)">
<span class="thumb-frame"></span>
</span>
<span class="date-added">Date Added: 20/01/2015</span>
</a>
<span class="clear"><!-- --></span>
</div>
<span class="clear"><!-- --></span>
</div>
<div class="media-index-section float-right">
<a class="gallery-title fanart" href="fanart">
<span class="view-all"><span class="arrow"></span>All Fan Art</span>
<span class="gallery-icon"></span>
Fan Art <span class="total">(1,363)</span>
</a>
<div class="section-content">
<a class="thumb-wrapper left-col" href="fanart?view=fanart-1371">
<span class="thumb-bg" style="background-image:url(http://media.blizzard.com/wow/media/fanart/fanart-1371-index-thumb.jpg)">
<span class="thumb-frame"></span>
</span>
<span class="date-added">Date Added: 20/01/2015</span>
</a>
<a class="thumb-wrapper" href="fanart?view=fanart-1370">
<span class="thumb-bg" style="background-image:url(http://media.blizzard.com/wow/media/fanart/fanart-1370-index-thumb.jpg)">
<span class="thumb-frame"></span>
</span>
<span class="date-added">Date Added: 20/01/2015</span>
</a>
<span class="clear"><!-- --></span>
</div>
<span class="clear"><!-- --></span>
</div>
<span class="clear"><!-- --></span>
<div class="media-index-section float-left">
<a class="gallery-title comics" href="comics">
<span class="view-all"><span class="arrow"></span>All Comics</span>
<span class="gallery-icon"></span>
Comics <span class="total">(458)</span>
</a>
<div class="section-content">
<a class="thumb-wrapper left-col" href="comics?view#/comic-2015-01-20">
<span class="thumb-bg" style="background-image:url(http://media.blizzard.com/wow/media/comics/comic-2015-01-20-index-thumb.jpg)">
<span class="thumb-frame"></span>
</span>
<span class="date-added">Date Added: 20/01/2015</span>
</a>
<a class="thumb-wrapper" href="comics?view#/comic-2014-12-01">
<span class="thumb-bg" style="background-image:url(http://media.blizzard.com/wow/media/comics/comic-2014-12-01-index-thumb.jpg)">
<span class="thumb-frame"></span>
</span>
<span class="date-added">Date Added: 12/12/2014</span>
</a>
<span class="clear"><!-- --></span>
</div>
<span class="clear"><!-- --></span>
</div>
<div class="media-index-section float-right">
<a class="gallery-title costumes" href="costumes">
<span class="view-all"><span class="arrow"></span>All Costumes</span>
<span class="gallery-icon"></span>
Costume Gallery <span class="total">(79)</span>
</a>
<div class="section-content">
<a class="thumb-wrapper left-col" href="costumes">
<span class="thumb-bg" style="background-image:url(http://media.blizzard.com/wow/media/costumes/costumes-0094-index-thumb.jpg)">
<span class="thumb-frame"></span>
</span>
<span class="date-added">Date Added: 17/10/2014</span>
</a>
<a class="thumb-wrapper" href="costumes">
<span class="thumb-bg" style="background-image:url(http://media.blizzard.com/wow/media/costumes/costumes-0083-index-thumb.jpg)">
<span class="thumb-frame"></span>
</span>
<span class="date-added">Date Added: 09/10/2014</span>
</a>
<span class="clear"><!-- --></span>
</div>
<span class="clear"><!-- --></span>
</div>
<span class="clear"><!-- --></span>
<div class="media-index-section float-left">
<a class="gallery-title misc" href="misc">
<span class="view-all"><span class="arrow"></span>All Misc</span>
<span class="gallery-icon"></span>
Misc Galleries <span class="total">(397)</span>
</a>
<div class="section-content">
<a class="thumb-wrapper left-col" href="miscdesserts">
<span class="thumb-bg" style="background-image:url(http://media.blizzard.com/wow/media/misc/desserts/desserts-2014-08-index-thumb.jpg)">
<span class="thumb-frame"></span>
</span>
<span class="date-added">Date Added: 22/08/2014</span>
</a>
<a class="thumb-wrapper" href="miscpumpkins">
<span class="thumb-bg" style="background-image:url(http://media.blizzard.com/wow/media/misc/pumpkins/pumpkin-2007-23-index-thumb.jpg)">
<span class="thumb-frame"></span>
</span>
<span class="date-added">Date Added: 11/06/2014</span>
</a>
<span class="clear"><!-- --></span>
</div>
<span class="clear"><!-- --></span>
</div>
<span class="clear"><!-- --></span>
</div>
</div>
<div style="display:none" id="media-preload-container"></div>
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