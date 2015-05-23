<!-- DO NOT TOUCH -->
<?php require_once('../system/config.php');
$account->AccountLoginQuery();
?> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" class="en-gb">
<head xmlns:og="http://ogp.me/ns#" xmlns:fb="http://ogp.me/ns/fb#">
<meta http-equiv="imagetoolbar" content="false" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="viewport" content="width=device-width" />
<!-- YOU CAN TOUCH NOW -->
<!-- (If you know what you're doing) -->
<!-- Description of CMS -->
<?php include(__WEBKIT__.'desc.php'); ?>
<!-- Description of CMS END -->
<title><?php echo TITLE ?> | Shop Main</title>
<link rel="stylesheet" type="text/css" media="all" href="assets/static/main/css/maincustom.css" />
<link rel="stylesheet" type="text/css" media="all" href="assets/static/main/css/common.min.css" />
<link rel="stylesheet" type="text/css" media="all" href="assets/static/css/toolkit/bnet-web.min.css" />
<link rel="stylesheet" type="text/css" media="all" href="assets/static/css/global/global.min.css" />
<link rel="stylesheet" type="text/css" media="all" href="assets/static/css/browse/browse.min.css" />
<script src="assets/static/main/js/third-party/jquery-1.11.0.min.js"></script>
<script src="assets/static/main/js/core.min.js"></script>
<script type="text/javascript" src="assets/static/main/js/third-party/mtagconfig.js"></script>
</head>
<body class=" browse-template">
<script>
//<![CDATA[
(function() {
var body = document.getElementsByTagName("body")[0];
body.className = body.className + " js-enabled";
})();
//]]>
</script>
<div class="navbar-static">
<header class="navbar header">
<div class="grid-container">
<div class="grid-25">
<a class="brand mark" href="index.html"><?php echo TITLE ?> Shop</a>
</div>
<div class="grid-75">
<!-- User Panel -->
<?php include(__WEBKIT__.'userpanel.php'); ?>
<!-- User Panel END --></div>
</div>
</header>
<nav class="navbar">
<div class="grid-container">
<div class="grid-50">
<ul class="breadcrumb">
<li class="active"><span class="breadcrumb-home"><i class="icon-home"></i>Shop</span></li>
</ul>
</div>
<div class="grid-50">
<ul class="nav">
<li class="pull-right region-status"><span><i class="icon-globe"></i>General</span></li>
</ul>
</div>
</div>
</nav>
</div>
<div class="body-content">
<div class="home-banner">
<div id="hero-carousel" class="carousel-banner">
<div class="item active">
<a href="#" style="background-color: #D1D1D1; background-image: url(assets/static/images/banners/en/vote.jpg)" data-gtm-click="homepageCarouselClick" data-gtm-promo-name="Homepage Carousel" data-gtm-position="1"> 
<div class="cover"></div>
</a>
</div>
<div class="item ">
<a href="#" style="background-color: #240D05; background-image: url(assets/static/images/banners/en/thank.jpg)" data-gtm-click="homepageCarouselClick" data-gtm-promo-name="Homepage Carousel" data-gtm-position="2">
<div class="cover"></div>
</a>
</div>
<div class="item ">
<a href="#" style="background-color: #240D05; background-image: url(assets/static/images/banners/en/faction.jpg)" data-gtm-click="homepageCarouselClick" data-gtm-promo-name="Homepage Carousel" data-gtm-position="3">
<div class="cover"></div>
</a>
</div>
<div class="item ">
<a href="#" style="background-color: #240D05; background-image: url(assets/static/images/banners/en/sc2.4L0gS.jpg)" data-gtm-click="homepageCarouselClick" data-gtm-promo-name="Homepage Carousel" data-gtm-position="4">
<div class="cover"></div>
</a>
</div>
<div class="item ">
<a href="#" style="background-color: #012112; background-image: url(assets/static/images/banners/en/wow-pet-mounts.3jJor.jpg)" data-gtm-click="homepageCarouselClick" data-gtm-promo-name="Homepage Carousel" data-gtm-position="5"> 
<div class="cover"></div>
</a>
</div>
<div class="carousel-banner-controls">
<button class="carousel-button left" href="#hero-carousel-prev" data-slide="prev"><span></span></button>
<button class="carousel-button right" href="#hero-carousel-next" data-slide="next"><span></span></button>
</div>
</div>
</div>
<div class="grid-container">
<div class="browse-container">
<div class="browse-column">
<div class="home-sidebar">
<ul class="game-types nav nav-list">
<li>
<a href="#">
<i class="game-badge wow"></i>
<span class="game-name">
<span class="filter-text">Gold</span>
<span class="product-count">(36)</span>
</span>
</a>
</li>
<li>
<a href="#">
<i class="game-badge diablo"></i>
<span class="game-name">
<span class="filter-text">Silver</span>
<span class="product-count">(2)</span>
</span>
</a>
</li>
<li>
<a href="#">
<i class="game-badge starcraft"></i>
<span class="game-name">
<span class="filter-text">Copper</span>
<span class="product-count">(3)</span>
</span>
</a>
</li>
</ul>
<ul class="product-types nav nav-list">
<li>
<a href="product/category/digital-games">
<span class="filter-text">Vote</span><i class="icon icon-external-link"></i>
</a>
</li>
<li>
<a href="product/category/game-time">
<span class="filter-text">Donate</span><i class="icon icon-external-link"></i>
</a>
</li>

</ul>
</div>
<div class="gear-store-sidebar">
<a class="gear-store-sidebar-link" href="#" tabindex="1" data-external="true">
<div class="cover"></div>
<div class="gear-store-thumbnail">
<img src="assets/static/main/images/offer/offer-landing.jpg" alt="Gear Store" />
<div class="gear-store-banner-info">
<h3>Vote now! <i class="icon icon-external-link"></i></h3>
<p>Vote now and earn Copper & Silver Coins with a chance for a Gold Coin for Epic rewards!</p>
</div>
</div>
</a>
</div>
</div>
<?php include(__WEBKIT__.'rewards.php'); ?>
</div>
</div>
<script>
//<![CDATA[
$(function () {
ShopCarousel();
if (typeof _gaq !== 'undefined') {
_gaq.push(['_trackPageview', '/shop/en/']);
}
});
//]]>
</script>
</div>
<?php include(__WEBKIT__.'footer_shop.php'); ?>
<script>
//<![CDATA[
if (typeof Msg === "undefined") {
var Msg = {};
}
Msg.userCurrency = "EUR";
//]]>
</script>
<script>
//<![CDATA[
var xsToken = '';
var supportToken = '';
var jsonSearchHandlerUrl = 'http://eu.battle.net/';
var Msg = Msg || {};
Msg.analytics = {
account: 'UA-544112-16',
domainName: '.battle.net',
pageUrl: '/shop/en/',
eventPrefix: '',
pagePrefix: '',
pageSuffix: ''
};
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
<script src="assets/static/main/js/toolkit.min.js"></script>
<script type="text/javascript" src="assets/static/main/js/global.min.js"></script>
<script type="text/javascript" src="assets/static/main/js/browse-carousel-banner.min.js"></script>
<script src="assets/static/main/js/legal.min.js"></script>
<div id="ajax-indicator" class="ajax-indicator"></div>
</body>
</html>