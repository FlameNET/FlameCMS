<?php
session_start();
require_once('../../system/config.php');
$account->AccountLoginQuery();
$account->AccountLoginCheck();
?> 
<!-- DO NOT TOUCH -->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" class="en-gb">
<head xmlns:og="http://ogp.me/ns#" xmlns:fb="http://ogp.me/ns/fb#">
<meta http-equiv="imagetoolbar" content="false"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<!-- YOU CAN TOUCH NOW -->
<!-- (If you know what you're doing) -->
<!-- Description of CMS -->
<?php include(WEBKIT.'desc.php'); ?>
<!-- Description of CMS END -->
<title><?php echo TITLE ?> Account</title>
<!-- The Styles & Javascripts of the CMS -->
<link rel="shortcut icon" href="assets/images/logos/favicon.png"/>
<link rel="search" type="application/opensearchdescription+xml" href="en-gb/data/opensearch" title="Battle.net Search"/>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo BASE_URL ?>assets/account/static/local-common/css/common.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo BASE_URL ?>assets/account/static/css/bnet.css" />
<link rel="stylesheet" type="text/css" media="print" href="<?php echo BASE_URL ?>assets/account/static/css/bnet-print.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo BASE_URL ?>assets/account/static/css/legal/ratings.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo BASE_URL ?>assets/account/static/css/inputs.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo BASE_URL ?>assets/account/static/css/management/lobby.css" />
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
<body class="en-gb ">
<div id="layout-top">
	<div class="wrapper">
		<div id="header">
			<div id="search-bar">
				<form action="#" id="search-form" method="get">
					<input type="hidden" id="csrftoken" name="csrftoken" value="#"/>
					<div>
						<input accesskey="q" alt="Search Battle.net" id="search-field" maxlength="35" name="q" tabindex="50" type="text" value="Search Battle.net"/>
						<input id="search-button" title="Search Battle.net" tabindex="50" type="submit" value=""/>
					</div>
				</form>
			</div>
			<h1 id="logo"><a accesskey="h" href="<?php echo ACCOUNT_URL ?>management/" tabindex="50"></a></h1>
			<div id="navigation">
				<div id="page-menu" class="large">
					<h2><a href="/account/management/"> Account </a></h2>
					<ul>
						<li class="active">
						<a href="/account/management/" class="border-3">Summary</a>
						<span class="arrow"></span>
						</li>
						<li>
						<a href="#" class="border-3 menu-arrow" onclick="openAccountDropdown(this, 'settings'); return false;">Settings</a>
						<span class="arrow"></span>
						<div class="flyout-menu" id="settings-menu" style="display: none">
							<ul>
								<li><a href="/account/management/settings/change-email.html">Change E-mail Address</a></li>
								<li><a href="/account/management/settings/change-password.html">Change Password</a></li>
								<li><a href="/account/management/settings/change-communication.html">Communication Preferences</a></li>
								<li><a href="/account/parental-controls/index.html">Parental Controls</a></li>
								<li><a href="/account/management/wallet.html">My Payment Options</a></li>
								<li><a href="/account/management/primary-address.html">Contact &amp; Shipping Addresses</a></li>
							</ul>
							<!--[if IE 6]>&#160;
							<iframe id="settings-shim" src="javascript:false;" frameborder="0" scrolling="no" style="display: block; position: absolute; top: 0; left: 0; width: 200px; height: 220px; z-index: -1;"></iframe>
							<script type="text/javascript">
							//<![CDATA[
							(function(){
							var doc = document;
							var shim = doc.getElementById('settings-shim');
							shim.style.filter = 'progid:DXImageTransform.Microsoft.Alpha(style=0,opacity=0)';
							shim.style.display = 'block';
							})();
							//]]>
							</script>
							<![endif]-->
						</div>
						</li>
						<li>
						<a href="#" class="border-3 menu-arrow" onclick="openAccountDropdown(this, 'games'); return false;">Games &amp; Codes</a>
						<span class="arrow"></span>
						<div class="flyout-menu" id="games-menu" style="display: none">
							<ul>
								<li><a href="/account/management/claim-code.html">Add a Game Key</a></li>
								<li><a href="/account/management/get-a-game.html">Buy Digital Games</a></li>
								<li><a href="/account/management/wow-account-conversion.html">Merge a World of Warcraft® Account</a></li>
								<li><a href="/account/management/download/">Download Clients</a></li>
								<li><a href="/account/management/beta-profile.html">Beta Profile Settings</a></li>
								<li><a href="/account/management/claim-code.html">Code Redemption</a></li>
								<li><a href="/account/management/links.html">Connected Accounts</a></li>
							</ul>
						</div>
						</li>
						<li>
						<a href="#" class="border-3 menu-arrow transaction" onclick="openAccountDropdown(this, 'activity'); return false;">Transaction History <span id="chargebackCount" class="border-3" style="">0</span>
						</a>
						<span class="arrow"></span>
						<div class="flyout-menu" id="activity-menu" style="display: none">
							<ul>
								<li><a href="/account/management/orders.html">Order History</a></li>
								<li><a href="/account/management/transaction-history.html">Balance History</a></li>
							</ul>
						</div>
						</li>
						<li>
						<a href="/account/management/authenticator.html" class="border-3 menu-arrow" onclick="openAccountDropdown(this, 'security'); return false;">Security Options</a>
						<span class="arrow"></span>
						<div class="flyout-menu" id="security-menu" style="display: none">
							<ul>
								<li><a href="/account/management/authenticator.html">Authenticator</a></li>
								<li><a href="/account/management/mobile-alert-dashboard.html">Battle.net SMS Protect</a></li>
								<li><a href="/account/management/authorizations.html">Authorized Applications</a></li>
							</ul>
						</div>
						</li>
						<li xmlns="#" class="account-balance account-balance-eur" id="accountBalanceCenter" data-tooltip-options="{&quot;location&quot;: &quot;mouse&quot;}">
						<a href="#" class="border-3 menu-arrow title" onclick="openAccountDropdown(this, 'accountBalance'); return false;">
						<span class="sub-title">Balance:</span><br/>
						<span class="balance" id="primary-balance">Gold 20.50 </span>
						</a>
						<div class="flyout-menu" id="accountBalance-menu">
							<ul>
								<li id="EUR" class="switch-currency selected"><span>Gold 20.50 </span></li>
								<li id="GBP" class="switch-currency selected"><span>Silver 17.50 </span></li>
								<li class=" first"><a href="">Add Funds</a></li>
								<li class=" "><a href="">Add Pre-Paid Card</a></li>
								<li class=" line "><a href="">Balance History</a></li>
								<li class="line"><a href="#" onclick="$('#account-balance-dialog').dialog('open'); return false;">Other Currencies...</a></li>
								<li class="line"><a href="">Balance Help</a></li>
								<li id="refreshBalance"><a href="" onclick="accountBalance.refreshBalance(); return false;">Refresh Balance</a></li>
								<li class="refreshing" id="refreshingBalance"><a href="" onclick="return false;"><img src="//bneteu-a.akamaihd.net/account/static/images/icons/loader.45RKv.gif" alt="" height="11" width="16"/>Refreshing…</a></li>
							</ul>
						</div>
						</li>
					</ul>
					<span class="clear">
					<!-- -->
					</span>
				</div>
				<div class="account-balance-dialog" style="display: none" id="account-balance-dialog">
					 One form of currency cannot be converted into another, and some currencies may not be used in some regions. For example, account balance in USD can only be used on the North American regional site (us.battle.net). <a href="#">More Info</a><br/>
					<br/>
				</div>
				<script type="text/javascript">
				//<![CDATA[
				$(function() {
				accountBalance.accountBalanceCurrency = "EUR";
				accountBalance.currencyMap = {
				'EUR' : {
				'format': 'EUR {0}',
				'groupSize': 3,
				'delimiter': ',',
				'point': '.'
				},
				'GBP' : {
				'format': 'GBP {0}',
				'groupSize': 3,
				'delimiter': ',',
				'point': '.'
				},
				'RUB' : {
				'format': 'RUB {0}',
				'groupSize': 3,
				'delimiter': ',',
				'point': '.'
				},
				'BET' : {
				'format': 'BZ${0}',
				'groupSize': 3,
				'delimiter': ',',
				'point': '.'
				}
				};
				accountBalance.initialize();
				$('.account-balance-dialog').dialog({
				autoOpen: false,
				modal: true,
				position: "center",
				resizeable: false,
				closeText: "Close",
				buttons: {
				'Ok': function() {
				$(this).dialog("close");
				}
				},
				open: function() {
				$(".ui-dialog-buttonpane").find("button").addClass("button1").find(":first").addClass("first");
				if(Core.browser=="ie6" || Core.browser=="ie7" || Core.browser=="ie8"){
				$(".ui-widget-overlay").css("opacity", 0.8);
				}
				}
				});
				});
				//]]>
				</script>
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
			<div id="lobby">
				<div id="page-content" class="page-content">
					<div id="lobby-account">
						<h3 class="section-title">Account Details</h3>
						<div class="lobby-box">
							<h4 class="subcategory">Account e-Mail</h4>
							<p>
							<?php echo $profile['email']; ?>
								<span class="edit">[<a href="#">Edit</a>]</span>
							</p>
							<h4 class="subcategory">Name</h4>
							<p>
							<?php echo $profile['first_name']; ?>
							<?php echo $profile['last_name']; ?>
							</p>
							<h4 class="subcategory help-link-right" data-tooltip="BattleTag represents your login known as username..." data-tooltip-options='{"location": "mouse"}'>BattleTag&reg;</h4>
							<p>
								<?php echo $profile['first_name']; ?><?php echo $profileAuth['username']; ?>
								<span class="edit">[<a href="#">Change</a>]</span>
							</p>
							<h4 class="subcategory">Country of Residence</h4>
							<p>
								<?php echo $profile['country']; ?>
								<span class="help-note" data-tooltip="Your country of residence determines various settings, such as which products are offered for purchase. To change this setting, please contact Customer Support." data-tooltip-options='{"location": "mouse"}'><img height="16" width="16" src="//bneteu-a.akamaihd.net/account/static/images/icons/tooltip-help.0WRiu.gif"/></span>
							</p>
						</div>
						<h3 class="section-title">Account Security</h3>
						<div class="lobby-box security-box">
							<h4 class="subcategory">Account E-mail</h4>
							<p class="has-authenticator-has-active">
								 Verified
							</p>
						</div>
					</div>
					<div id="lobby-games">
						<h3 class="section-title">Your Game Accounts</h3>
						<div id="games-list">
							<a href="#wow" class="border-2 games-title opened" rel="game-list-wow">World of Warcraft</a>
							<ul id="game-list-wow">
								<li class="border-4" id="WoW1::EU">
								<span class="game-icon">
								<span class="png-fix"><img src="<?php echo BASE_URL ?>assets/account/static/local-common/images/game-icons/wow.png" alt="" width="36" height="36" /></span>
								<span class="flag upgrade" data-tooltip="Account Active" data-tooltip-options="{&quot;location&quot;: &quot;mouse&quot;}"></span>
								</span>
								<span class="account-info">
								<span class="account-link">
								<strong><a class="EU-WOW-wod-ce" href="#"> World of Warcraft&reg; : Warlords of Draenor&#8482; </a></strong>
								<span class="account-id">
								[MvP] <span class="account-edition">Donator Rank 3</span>
								<span class="account-status ACTIVE">Active</span>
								</span>
								<span class="account-region">Europe (EU)</span>
								</span>
								</span>
								</li>
							</ul>
							<a href="#battlenetapp" class="games-title border-2 opened" rel="game-list-battlenetapp">Battle.net App</a>
							<ul id="game-list-battlenetapp">
								<li class="classic border-4">
								<span class="game-icon">
								<img src="<?php echo BASE_URL ?>assets/account/static/local-common/images/game-icons/app.png" /> </span>
								<span class="account-info">
								<span class="account-link">
								<a href="#">TITLE App</a>
								</span>
								</span>
								</li>
							</ul>
						</div>
						<div id="games-tools">
							<a href="#" id="add-game" class="border-5">Add Balance [$]</a>
							<p>
								<a href="#" class="" onclick="">
								<span class="icon-16 icon-account-buy"></span>
								<span class="icon-16-label">Buy Digital Packages</span>
								</a>
							</p>
							<p>
								<a href="#" class="" onclick="">
								<span class="icon-16 icon-account-merge"></span>
								<span class="icon-16-label">Vote now!</span>
								</a>
							</p>
							<p>
								<a href="#" class="" onclick="">
								<span class="icon-16 icon-account-download"></span>
								<span class="icon-16-label">Download App</span>
								</a>
							</p>
							<p>
								<a href="#" class="" onclick="">
								<span class="icon-16 icon-account-beta"></span>
								<span class="icon-16-label">Changelog</span>
								</a>
							</p>
							<p>
								<a href="#" class="" onclick="">
								<span class="icon-16 icon-account-merge"></span>
								<span class="icon-16-label">Connected Accounts</span>
								</a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="layout-bottom-divider">
</div>
<div id="layout-bottom">
	<div class="wrapper">
		<?php include(WEBKIT.'footer.php'); ?>
	</div>
</div>
<script type="text/javascript">
//<![CDATA[
var csrftoken = "#";
$(function() {
Locale.dataPath = "data/i18n.frag.xml";
});
var fullTimeDisplay = true;
//]]>
</script>
<script>
//<![CDATA[
var xsToken = '2258de28-5f46-464a-9865-8650923e062f';
var supportToken = '';
var jsonSearchHandlerUrl = '\//eu.battle.net';
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
<script type="text/javascript" src="//bneteu-a.akamaihd.net/account/static/js/bam.2MTss.js?v=58-28"></script>
<script type="text/javascript" src="//bneteu-a.akamaihd.net/account/static/local-common/js/common/menu.2LSka.js?v=58-28"></script>
<script type="text/javascript" src="//bneteu-a.akamaihd.net/account/static/local-common/js/third-party/jquery-ui-1.10.2.custom.min.4DFLs.js?v=58-28"></script>
<script type="text/javascript" src="//bneteu-a.akamaihd.net/account/static/js/management/lobby.1BmKi.js"></script>
<script>
//<![CDATA[
(function() {
var ga = document.createElement('script');
var src = "https://ssl.google-analytics.com/ga.js";
if ('http:' == document.location.protocol) {
src = "http://www.google-analytics.com/ga.js";
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
var xsToken = '2258de28-5f46-464a-9865-8650923e062f';
var supportToken = '';
var jsonSearchHandlerUrl = '\//eu.battle.net';
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
</body>
</html>