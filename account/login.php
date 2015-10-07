<?php session_start();
require_once('../system/config.php');
if(isset($_POST['submit']))
{
	$email			= trim($_POST['accountName']);
	$password		= trim($_POST['password']);
    $sha_pass_hash	= sha1(strtoupper($email) . ":" . strtoupper($password));
	$query			= $connect->WebQuery("SELECT * FROM account WHERE email='{$email}' AND password='{$sha_pass_hash}' AND activation_code IS NULL");
	$num_row		= $query->num_rows;
	$row			= $query->fetch_array();

	if( $num_row ==1 )
	{
		$_SESSION['email']=$row['email'];
		header("Location: ".ACCOUNT_URL."management");
		exit;
	}
	else
	{
		echo '<center>You have not activated your account</center>';
	}
}
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-us" class="en-us">
<head xmlns:og="http://ogp.me/ns#" xmlns:fb="http://ogp.me/ns/fb#">
<meta http-equiv="imagetoolbar" content="false" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title><?php echo TITLE ?> Account Login</title>
<link rel="shortcut icon" href="//bnetus-a.akamaihd.net/login/static/images/meta/favicon.2dy4z.ico" />
<!--[if gt IE 8]><!--><link rel="stylesheet" type="text/css" media="all" href="<?php echo BASE_URL ?>assets/login/static/css/toolkit/bnet-web.min.css" /><!-- <![endif]-->
<!--[if IE 8]><link rel="stylesheet" type="text/css" media="all" href="<?php echo BASE_URL ?>assets/login/static/css/toolkit/bnet-web-ie8.min.css" /><![endif]-->
<link rel="stylesheet" type="text/css" media="all" href="<?php echo BASE_URL ?>assets/login/static/css/login/global.min.css" />
<link rel="search" type="application/opensearchdescription+xml" href="http://us.battle.net/en-us/data/opensearch" title="Battle.net Search" />
<script type="text/javascript" src="//bnetus-a.akamaihd.net/login/static/local-common/js/third-party/jquery-1.11.0.min.1UgDG.js?v=23-1"></script>
<script type="text/javascript" src="//bnetus-a.akamaihd.net/login/static/local-common/js/common/core.min.3K9yg.js?v=23-1"></script>
<script type="text/javascript" src="//bnetus-a.akamaihd.net/login/static/local-common/js/common/locale.min.0FIrp.js?v=23-1"></script>
<meta name="viewport" content="width=device-width" />
<script type="text/javascript">
//<![CDATA[
var Core = Core || {},
Login = Login || {};
Core.staticUrl = '/login/static';
Core.sharedStaticUrl = '/login/static/local-common';
Core.baseUrl = '/login/en';
Core.projectUrl = '/login';
Core.cdnUrl = 'http://media.blizzard.com';
Core.supportUrl = 'http://us.battle.net/support/';
Core.secureSupportUrl = 'https://us.battle.net/support/';
Core.project = 'login';
Core.locale = 'en-us';
Core.language = 'en';
Core.region = 'us';
Core.shortDateFormat = 'MM/dd/yyyy';
Core.dateTimeFormat = 'MM/dd/yyyy hh:mm a';
Core.loggedIn = false;
Core.userAgent = 'web';
Login.embeddedUrl = 'https://us.battle.net/login/login.frag';
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-544112-16']);
_gaq.push(['_setDomainName', '.battle.net']);
_gaq.push(['_setAllowLinker', true]);
_gaq.push(['_trackPageview']);
//]]>
</script>
</head>
<body class="en-us login-template web bnet" data-embedded-state="STATE_LOGIN">
<script>
//<![CDATA[
(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({"gtm.start":new Date().getTime(),event:"gtm.js"});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!="dataLayer"?"&amp;l="+l:"";j.async=true;j.src=
"//www.googletagmanager.com/gtm.js?id="+i+dl;f.parentNode.insertBefore(j,f);})
(window,document,"script","dataLayer","GTM-589KTQ");
//]]>
</script>
<script type="text/javascript">
//<![CDATA[
(function() {
var body = document.getElementsByTagName("body")[0];
body.className = body.className + " js-enabled preload";
})();
$(function(){
$('body').removeClass('preload');
});
//]]>
</script>
<div class="grid-container wrapper" >
<h1 class="logo"><?php echo TITLE ?> Account Login</h1>
<div class="hide mobile-grid-35 mobile-prefix-10" id="info-wrapper">
<h2><strong class="info-title"></strong></h2>
<p class="info-body"></p>
<button class="btn btn-block hide visible-phone" id="info-phone-close">Close</button>
</div>
<div class="input-container" id="login-wrapper">
<form action="" method="post" id="password-form" class="username-required input-focus" >
<div class="control-group">
<label id="accountName-label" class="control-label" for="accountName">E-mail</label>
<div class="controls">
<input aria-labelledby="accountName-label" id="accountName" value="" name="accountName" title="E-mail" maxlength="320" type="text" tabindex="1" class="input-block input-large" placeholder="E-mail" autofocus="autofocus" autocorrect="off" spellcheck="false" />
</div>
</div>
<div class="control-group">
<label id="password-label" class="control-label" for="password">Password</label>
<div class="controls">
<input
aria-labelledby="password-label" id="password" name="password" title="Password" maxlength="16" type="password" tabindex="1" class="input-block input-large" autocomplete="off" placeholder="Password" autocorrect="off" spellcheck="false" />
</div>
</div>
<div class="persistWrapper">
<label id="persistLogin-label" class="checkbox-label css-label " for="persistLogin">
<input aria-labelledby="persistLogin-label" id="persistLogin" name="persistLogin" type="checkbox" checked="checked" tabindex="1"/>
<span class="input-checkbox"></span>
Keep me logged in
</label>
</div>
<div class="control-group submit ">
<button type="submit" id="submit" name="submit" class="btn btn-primary btn-large btn-block " data-loading-text="" tabindex="1">
Log In
<i class="spinner-battlenet"></i>
</button>
</div>
<ul id="help-links">
<li>
<a class="btn btn-block btn-large" rel="external" href="<?php ACCOUNT_URL ?>register" tabindex="1">
Create Free Account
<i class="icon-external-link"></i>
</a>
</li>
<li>
<a class="" rel="external" href="#" tabindex="1">
Can&#39;t log in?
<i class="icon-external-link"></i>
</a>
</li>
</ul>
<input type="hidden" id="csrftoken" name="csrftoken" value="2df954fc-4fdb-4a7a-82c4-d1d42819f288" />
</form>
</div>
<footer class="footer footer-us">
<div class="lower-footer-wrapper">
<div class="lower-footer">
<div id="copyright">
<span>&copy;2015 Blizzard Entertainment, Inc. All rights reserved</span>
<a onclick="return Core.open(this);" href="#" tabindex="100" data-action="Footer - Terms of Use">Terms of Use</a>
<a onclick="return Core.open(this);" href="#" tabindex="100" data-action="Footer - Legal">Legal</a>
<a onclick="return Core.open(this);" href="#" tabindex="100" data-action="Footer - Privacy Policy">Privacy Policy</a>
<a onclick="return Core.open(this);" href="#" tabindex="100" data-action="Footer - Copyright Infringement">Copyright Infringement</a>
</div>
<div id="legal">
<div id="legal-ratings" class="png-fix">
</div>
<span class="clear"><!-- --></span>
</div>
</div>
<div id="marketing-trackers">
<div class="marketing-cover"></div>
</div>
</div>
<script type="text/javascript">
//<![CDATA[
$(function() {
var category = Core.project + ' - Footer Navigation';
Core.bindTrackEvent('#sitemap a', category);
Core.bindTrackEvent('#copyright a[data-action]', category);
});
//]]>
</script>
</footer> </div>
<script src="<?php echo BASE_URL ?>assets/login/static/js/embedded-javascript/embed-0.1.5.min.js"></script>
<script>
//<![CDATA[
var xsToken = '';
var supportToken = '';
var jsonSearchHandlerUrl = '//us.battle.net';
var Msg = Msg || {};
Msg.support = {
ticketNew: 'Ticket {0} was created.',
ticketStatus: 'Ticket {0}’s status changed to {1}.',
ticketOpen: 'Open',
ticketAnswered: 'Answered',
ticketResolved: 'Resolved',
ticketCanceled: 'Canceled',
ticketArchived: 'Archived',
ticketInfo: 'Need Info',
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
<script src="//bnetus-a.akamaihd.net/login/static/js/toolkit/toolkit.min.4YZ0o.js"></script>
<script type="text/javascript" src="//bnetus-a.akamaihd.net/login/static/js/login/login.min.1oTnZ.js?v=1"></script>
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
</body>
</html>