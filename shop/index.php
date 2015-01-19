<!-- DO NOT TOUCH -->
<?php require_once('../system/config.php'); ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" class="en-gb">
<head xmlns:og="http://ogp.me/ns#" xmlns:fb="http://ogp.me/ns/fb#">
<meta http-equiv="imagetoolbar" content="false" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<!-- YOU CAN TOUCH NOW -->
<!-- (If you know what you're doing) -->
<!-- Description of CMS -->
<?php include(__ROOT__.'/webkit/desc.php'); ?>
<!-- Description of CMS END -->
<title><?php echo TITLE ?></title>
<!-- The Styles & Javascripts of the CMS -->
<link rel="stylesheet" type="text/css" media="all" href="<?php echo BASE_URL ?>assets/css/common-game-site.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo BASE_URL ?>assets/css/wow.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo BASE_URL ?>assets/css/lightbox.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo BASE_URL ?>assets/css/wiki/wiki.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo BASE_URL ?>assets/css/shop/shop-index.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo BASE_URL ?>assets/css/locale/en-gb.css" />
<script type="text/javascript" src="<?php echo BASE_URL ?>assets/js/third-party.js?v=58-62"></script>
<script type="text/javascript" src="<?php echo BASE_URL ?>assets/js/common-game-site.js?v=58-62"></script>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo BASE_URL ?>assets/css/legal/ratings.css?v=58-62" />
</head>
<!-- The Styles & Javascripts of the CMS END -->
</head>
<body class="en-gb homepage news">
<div id="wrapper">
<!-- User Panel -->
<?php include(__ROOT__.'/webkit/userpanel.php'); ?>
<!-- User Panel END -->
<div id="header">
<!-- Search -->
<?php include(__ROOT__.'/webkit/search.php'); ?>
<!-- Search END -->
<h1 id="logo"><a href="<?php echo BASE_URL ?>"><?php echo TITLE ?></a></h1>
<!-- Header -->
<div class="header-plate">
<?php
$page = "menu-services";
include(__ROOT__.'/webkit/menu.php');
include(__ROOT__.'/webkit/userplate.php');?>
</div>
<!-- Header END -->
</div>
<div class="services-home">
<div id="content">
<div class="content-top body-top">
<div class="content-trail">
<ol class="ui-breadcrumb">
<li itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
<a href="http://eu.battle.net/wow/en/" rel="np" class="breadcrumb-arrow" itemprop="url">
<span class="breadcrumb-text" itemprop="name">World of Warcraft</span>
</a>
</li>
<li class="last" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
<a href="index.html" rel="np" itemprop="url">
<span class="breadcrumb-text" itemprop="name">Shop</span>
</a>
</li>
</ol>
</div>
<div class="content-bot clear">


<div class="wod-no-banner"></div>

	<div id="wiki" class="wiki directory wiki-index">
	

	<div class="panel game-subscriptions">
	<h2 class="header">
			Games and Subscriptions<a class="panelLink" href="game-purchase/index.html">Explore Options</a>
	</h2>

<div class="subscription-col subscription-1">
<a href="https://eu.battle.net/shop/en/product/world-of-warcraft" class="game-title">
<span class="tooltip" data-tooltip="#wow-battlechest-tooltip" data-tooltip-options='{"location": "mouse"}' style="visibility:hidden">World of Warcraft Battle Chest</span>
</a>
			
<a class="ui-button button1" href="https://eu.battle.net/shop/en/product/world-of-warcraft">
<span class="button-left"><span class="button-right">Buy Now</span></span></a>
<a class="ui-button button5" href="https://us.battle.net/account/creation/wow/signup/?utm_campaign=Shop_Buy&amp;utm_source=Internal-WoW&amp;utm_medium=Games_Subscriptions&amp;utm_content=Try_it_Free">
<span class="button-left"><span class="button-right">Try it free</span></span></a>
<a href="https://battle.net/shop/product/world-of-warcraft-subscription" class="subNow"><div class="subNowIcon"></div>Subscribe Now</a>

			<div id="wow-battlechest-tooltip" class="tooltip-content-div">
				<p>Everything you need to begin the adventure</p>
				<ul>
					<li>- World of Warcraft complete game</li>
					<li>- The Burning Crusade Expansion set</li>
					<li>- The Wrath of the Lich King expansion set</li>
					<li>- Includes first month of game time</li>
					<li>- Includes first month of game time</li>
				</ul>
			</div>
</div>
		<div class="subscription-col subscription-3">
			<a href="http://eu.battle.net/wow/en/warlords-of-draenor/" class="game-title">
				Warlords of Draenor (Expansion)
			</a>
			
<a class="ui-button button1" href="https://eu.battle.net/shop/en/product/world-of-warcraft-warlords-of-draenor"
><span class="button-left"><span class="button-right">Buy Now</span></span></a>
			<br/>
		</div>
		<p class="subscription-desc">World of Warcraft is a subscription-based online fantasy adventure that is composed of a core game and major content additions called expansions. Explore the game’s <a href="game-purchase/index.html">purchase and subscription options</a> and decide which one is best for you!</p>
	<span class="clear"><!-- --></span>
	</div>

	<div class="panel free-paid-services">
		<div id="free-services" class="services-column">
				<h2 class="header">
Free Services	</h2>

	<ul>
				<li>
					<a href="recruit-a-friend/index.html" class="free-services-raf">
						<span>Recruit-A-Friend</span>
					</a>
				</li>
				<li>
					<a href="http://eu.battle.net/support/restoration" class="free-services-item-restoration">
						<span>Item Restoration</span>
					</a>
				</li>
				<li>
					<a href="mobile-armory/index.html" class="free-services-mobile-armory">
						<span>WoW Mobile Armory</span>
					</a>
				</li>
				<li>
					<a href="http://eu.battle.net/security/" class="free-services-security">
						<span>Account Security</span>
					</a>
				</li>
	</ul>
		</div>
		<div id="paid-services" class="services-column">
				<h2 class="header">
Paid Services	</h2>

	<ul>
				<li>
					<a href="https://eu.battle.net/shop/en/product/world-of-warcraft-service-character-transfer" class="paid-services-character-transfer">
						<span>Character Transfer</span>
					</a>
				</li>
				<li>
					<a href="https://eu.battle.net/shop/en/product/world-of-warcraft-service-faction-change" class="paid-services-faction-change">
						<span>Faction Change</span>
					</a>
				</li>
				<li>
					<a href="https://eu.battle.net/shop/en/product/world-of-warcraft-service-race-change" class="paid-services-race-change">
						<span>Race Change</span>
					</a>
				</li>
				<li>
					<a href="https://eu.battle.net/shop/en/product/world-of-warcraft-service-appearance-change" class="paid-services-character-customization">
						<span>Appearance Change</span>
					</a>
				</li>
				<li>
					<a href="https://eu.battle.net/shop/en/product/world-of-warcraft-service-name-change" class="paid-services-name-change">
						<span>Name Change</span>
					</a>
				</li>
				<li>
					<a href="https://eu.battle.net/shop/en/product/world-of-warcraft-service-character-boost" class="paid-services-character-boost">
						<span>Level 90 Character Boost</span>
					</a>
				</li>
	</ul>
		</div>
			<a href="recruit-a-friend/index.html" class="ad-raf">
				<span>Recruit a friend,<br/>Earn epic rewards!</span>
			</a>
	</div>


	<div class="panel pet-mount">
	<h2 class="header">
			Pets, Mounts, and Helms<a class="panelLink" href="https://eu.battle.net/shop/en/product/game/wow">View All</a>
	</h2>
		<div class="product-block">
			<div id="pet-mount-list" class="companion-container">
						<a href="https://eu.battle.net/shop/product/world-of-warcraft-helm-crown-of-eternal-winter" class="product-item crown-of-eternal-winter" data-tooltip="Buy Now" data-tooltip-options='{"location": "mouse"}'>
							<span class="thumb"></span>
							<span class="name">Crown of <br/>Eternal Winter</span>
						</a>
						<a href="https://eu.battle.net/shop/product/world-of-warcraft-helm-hood-of-hungering-darkness" class="product-item hood-of-hungering-darkness" data-tooltip="Buy Now" data-tooltip-options='{"location": "mouse"}'>
							<span class="thumb"></span>
							<span class="name">Hood of<br/>Hungering Darkness</span>
						</a>
						<a href="https://eu.battle.net/shop/product/world-of-warcraft-helm-jewel-of-the-firelord" class="product-item jewel-of-the-firelord" data-tooltip="Buy Now" data-tooltip-options='{"location": "mouse"}'>
							<span class="thumb"></span>
							<span class="name">Jewel of<br/>the Firelord</span>
						</a>
						<a href="https://eu.battle.net/shop/product/world-of-warcraft-pet-blossoming-ancient" class="product-item blossoming-ancient" data-tooltip="Buy Now" data-tooltip-options='{"location": "mouse"}'>
							<span class="thumb"></span>
							<span class="name">Blossoming<br/> Ancient</span>
						</a>
						<a href="https://eu.battle.net/shop/product/world-of-warcraft-mount-armored-bloodwing" class="product-item armored-bloodwing" data-tooltip="Buy Now" data-tooltip-options='{"location": "mouse"}'>
							<span class="thumb"></span>
							<span class="name">Armored<br/> Bloodwing</span>
						</a>
						<a href="https://eu.battle.net/shop/product/world-of-warcraft-mount-heart-of-the-aspects" class="product-item heart-of-the-aspects" data-tooltip="Buy Now" data-tooltip-options='{"location": "mouse"}'>
							<span class="thumb"></span>
							<span class="name">Heart of<br/>the Aspects</span>
						</a>
						<a href="https://eu.battle.net/shop/product/world-of-warcraft-pet-cinder-kitten" class="product-item cinder-kitten" data-tooltip="Buy Now" data-tooltip-options='{"location": "mouse"}'>
							<span class="thumb"></span>
							<span class="name">Cinder<br/>Kitten</span>
						</a>
						<a href="https://eu.battle.net/shop/product/world-of-warcraft-mount-celestial-steed" class="product-item celestial-steed" data-tooltip="Buy Now" data-tooltip-options='{"location": "mouse"}'>
							<span class="thumb"></span>
							<span class="name">Celestial<br/>Steed</span>
						</a>
						<a href="https://eu.battle.net/shop/product/world-of-warcraft-mount-swift-windsteed" class="product-item swift-windsteed" data-tooltip="Buy Now" data-tooltip-options='{"location": "mouse"}'>
							<span class="thumb"></span>
							<span class="name">Swift<br/>Windsteed</span>
						</a>
						<a href="https://eu.battle.net/shop/product/world-of-warcraft-mount-winged-guardian" class="product-item winged-guardian" data-tooltip="Buy Now" data-tooltip-options='{"location": "mouse"}'>
							<span class="thumb"></span>
							<span class="name">Winged<br/>Guardian</span>
						</a>
						<a href="https://eu.battle.net/shop/product/world-of-warcraft-pet-pandaren-monk" class="product-item pandaren-monk" data-tooltip="Buy Now" data-tooltip-options='{"location": "mouse"}'>
							<span class="thumb"></span>
							<span class="name">Pandaren<br/>Monk</span>
						</a>
						<a href="https://eu.battle.net/shop/product/world-of-warcraft-pet-lil-ragnaros" class="product-item lil-ragnaros" data-tooltip="Buy Now" data-tooltip-options='{"location": "mouse"}'>
							<span class="thumb"></span>
							<span class="name">Lil<br/>Ragnaros</span>
						</a>
						<a href="https://eu.battle.net/shop/product/world-of-warcraft-pet-lil-kt" class="product-item lil-kt" data-tooltip="Buy Now" data-tooltip-options='{"location": "mouse"}'>
							<span class="thumb"></span>
							<span class="name">Lil<br/>K.T.</span>
						</a>
						<a href="https://eu.battle.net/shop/product/world-of-warcraft-pet-cenarion-hatchling" class="product-item cenarion-hatchling" data-tooltip="Buy Now" data-tooltip-options='{"location": "mouse"}'>
							<span class="thumb"></span>
							<span class="name">Cenarion<br/>Hatchling</span>
						</a>
						<a href="https://us.battle.net/shop/product/world-of-warcraft-pet-moonkin-hatchling" class="product-item moonkin-hatchling-alliance" data-tooltip="Buy Now" data-tooltip-options='{"location": "mouse"}'>
							<span class="thumb"></span>
							<span class="name">Moonkin<br/>Hatchling</span>
						</a>
						<a href="https://eu.battle.net/shop/product/world-of-warcraft-pet-guardian-cub" class="product-item guardian-cub" data-tooltip="Buy Now" data-tooltip-options='{"location": "mouse"}'>
							<span class="thumb"></span>
							<span class="name">Guardian<br/>Cub</span>
						</a>
						<a href="https://eu.battle.net/shop/product/world-of-warcraft-pet-lil-xt" class="product-item lil-xt" data-tooltip="Buy Now" data-tooltip-options='{"location": "mouse"}'>
							<span class="thumb"></span>
							<span class="name">Lil<br/>XT</span>
						</a>
						<a href="https://eu.battle.net/shop/product/world-of-warcraft-pet-soul-of-the-aspects" class="product-item soul-of-the-aspects" data-tooltip="Buy Now" data-tooltip-options='{"location": "mouse"}'>
							<span class="thumb"></span>
							<span class="name">Soul of<br/>the Aspects</span>
						</a>
			</div>
		</div>
		<a href="javascript:;" class="nav-button nav-prev" onclick="CompanionSlider.move(1);"></a>
		<a href="javascript:;" class="nav-button nav-next" onclick="CompanionSlider.move(-1);"></a>
	<span class="clear"><!-- --></span>
	</div>

		<script type="text/javascript">
		//<![CDATA[
		$(function() {
			CompanionSlider.init();
		});

		var CompanionSlider = {

			newPosition: 0,
			movement: 870,
			container: null,

			init: function(){
				CompanionSlider.container = $('#pet-mount-list');
				CompanionSlider.containerSize();
				CompanionSlider.navPrev = $('.pet-mount .nav-prev');
				CompanionSlider.navNext = $('.pet-mount .nav-next');
				CompanionSlider.setNav();
			},
			move: function(direction){
				var currentPosition = eval(CompanionSlider.container.css('left').replace('px',''));
				var prevPosition = CompanionSlider.newPosition;
				CompanionSlider.newPosition = prevPosition + direction*CompanionSlider.movement;

				if( CompanionSlider.newPosition <= currentPosition || CompanionSlider.newPosition >= currentPosition ){
					CompanionSlider.container.css('left', CompanionSlider.newPosition +'px');
					CompanionSlider.setNav();
				}
			},
			containerSize: function(){
				var itemCount = $('#pet-mount-list .product-item').length;
				var itemWidth = $('#pet-mount-list .product-item').outerWidth();
				CompanionSlider.container.width(itemCount*itemWidth);
			},
			setNav: function(){
				CompanionSlider.navPrev.show();
				CompanionSlider.navNext.show();

				if( CompanionSlider.newPosition == 0 ){
					CompanionSlider.navPrev.hide();
				}
				if( CompanionSlider.newPosition*-1 + CompanionSlider.movement > CompanionSlider.container.width() ){
					CompanionSlider.navNext.hide();
				}
			}
		}
		//]]>
		</script>



		
	<span class="clear"><!-- --></span>
	</div>

</div>
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
Menu.initialize(__ROOT__.'/assets/data/menu.json');
});
//]]>
</script>
<script type="text/javascript" src="<?php echo BASE_URL ?>assets/js/cms.min.js"></script>
</body>
</html>