<!-- DO NOT TOUCH -->
<?php require_once('system/config.php'); ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" class="en-gb">
<head xmlns:og="http://ogp.me/ns#" xmlns:fb="http://ogp.me/ns/fb#">
<meta http-equiv="imagetoolbar" content="false" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<!-- YOU CAN TOUCH NOW -->
<!-- (If you know what you're doing) -->
<!-- Description of CMS -->
<?php include('webkit/desc.php'); ?>
<!-- Description of CMS END -->
<title><?php echo TITLE ?> | Registration</title>
<!-- The Styles & Javascripts of the CMS -->
<link rel="shortcut icon" href="assets/images/logos/favicon.png" />
<link rel="search" type="application/opensearchdescription+xml" href="en-gb/data/opensearch" title="Battle.net Search" />
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
Login.embeddedUrl = '<?php echo CORE ?>loginframe.php';
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
<form action="search" id="search-form" method="get"><div>
<input accesskey="q" alt="Search Battle.net" id="search-field" maxlength="35" name="q" tabindex="50" type="text" value="Search Battle.net" />
<input id="search-button" title="Search Battle.net" tabindex="50" type="submit" value="" />
</div>
</form>
</div>
<h1 id="logo"><a accesskey="h" href="" tabindex="50"></a></h1>
<div id="navigation">
<div id="page-menu" class="large">
<h2><a href="<?php echo BASE_URL ?>assets/account/management/"> Account Creation
</a></h2>
<h2 class="second-header"></h2>
<span class="clear"><!-- --></span>
</div>
<span class="clear"><!-- --></span>
</div>
</div>
<!-- User Panel -->
<?php include('webkit/userpanel.php'); ?>
<!-- User Panel END -->
</div>
</div>
<div id="layout-middle">
<div class="wrapper">
<div id="content">
<div id="page-header">
<p class="privacy-message"><b>We value and respect your privacy.</b> Find out how <?php echo TITLE ?> safeguards user information by reading our <a href="#" onclick="window.open(this.href); return false;">Online Privacy Policy</a>.</p>
</div>
<form action="#" method="get" class="country-select">
<div xmlns="http://www.w3.org/1999/xhtml" class="input-row input-row-select">
<span class="input-left">
<label for="country">
<span class="label-text">
Country of Residence:
</span>
<span class="input-required"></span>
</label>
</span><!--
--><span class="input-right">
<span class="input-select input-select-small">
<select name="country" id="country" class="small border-5 glow-shadow-2" tabindex="1">
<option value="" selected="selected">Select a country</option>
<?php Countries(); ?>
</select>
<span class="inline-message " id="country-message">&#160;</span>
</span>
<button class="ui-button button1" type="submit" id="country-submit" tabindex="1" style="display: none;"><span class="button-left"><span class="button-right">Change Country</span></span></button>
</span>
</div>
<div class="input-row input-row-note" id="country-warning" style="display: none">
</div>
</form>
<script type="text/javascript">
//<![CDATA[
(function() {
var countrySubmit = document.getElementById('country-submit');
countrySubmit.style.display = 'none';
})();
//]]>
</script>
<div id="page-content">
<form action="#" method="post" id="creation">
<div class="form-blockable" id="country-change">
<div class="input-row input-row-text">
<span class="input-left">
<label for="firstname">
<span class="label-text">
Username:
</span>
<span class="input-required">*</span>
</label>
</span><!--
--><span class="input-right">
<span class="input-text input-text-small">
<input type="text" name="firstname" value="" id="firstname" class="small border-5 glow-shadow-2" autocomplete="off" maxlength="32" tabindex="1" required="required" placeholder="Username" />
<span class="inline-message " id="firstname-message">&#160;</span>
</span>
</span>
</div>
<div class="input-row input-row-select">
<span class="input-left">
<label for="dobDay">
<span class="label-text">
Date of Birth:
</span>
<span class="input-required">*</span>
</label>
</span>
<!--
--><span class="input-right">
<span class="input-select input-select-extra-extra-extra-small">
<select name="dobDay" id="dobDay" class="extra-extra-extra-small border-5 glow-shadow-2" tabindex="1" required="required">
<option value="" selected="selected">Day</option>
<?php Day(); ?>
</select>
<span class="inline-message no-text-clear" id="dobDay-message">&#160;</span>
</span>
<span class="input-select input-select-extra-extra-small">
<select name="dobMonth" id="dobMonth" class="extra-extra-small border-5 glow-shadow-2" tabindex="1" required="required">
<option value="" selected="selected">Month</option>
<option value="1">January</option>
<option value="2">February</option>
<option value="3">March</option>
<option value="4">April</option>
<option value="5">May</option>
<option value="6">June</option>
<option value="7">July</option>
<option value="8">August</option>
<option value="9">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select>
<span class="inline-message no-text-clear" id="dobMonth-message">&#160;</span>
</span>
<span class="input-select input-select-extra-extra-extra-small">
<select name="dobYear" id="dobYear" class="extra-extra-extra-small border-5 glow-shadow-2" tabindex="1" required="required">
<option value="" selected="selected">Year</option>
<?php Year(); ?>
</select>
<span class="inline-message no-text-clear" id="dobYear-message">&#160;</span>
</span>
<span class="inline-note">
<span class="caption">Parents registering for children, <a href="/account/creation/parent-signup.html?country=ALA&amp;theme=bnet">click here.</a></span>
</span>
</span>
</div>
<div class="input-row input-row-text">
<span class="input-left">
<label for="firstname">
<span class="label-text">
Name:
</span>
<span class="input-required">*</span>
</label>
</span><!--
--><span class="input-right">
<span class="input-text input-text-small">
<input type="text" name="firstname" value="" id="firstname" class="small border-5 glow-shadow-2" autocomplete="off" maxlength="32" tabindex="1" required="required" placeholder="First Name" />
<span class="inline-message " id="firstname-message">&#160;</span>
</span>
<span class="input-text input-text-small">
<input type="text" name="lastname" value="" id="lastname" class="small border-5 glow-shadow-2" autocomplete="off" maxlength="32" tabindex="1" required="required" placeholder="Last Name" />
<span class="inline-message " id="lastname-message">&#160;</span>
</span>
</span>
</div>
<div class="input-row input-row-text">
<span class="input-left">
<label for="emailAddress">
<span class="label-text">
E-mail Address:
</span>
<span class="input-required">*</span>
</label>
</span><!--
--><span class="input-right">
<span class="input-text input-text-small">
<input type="email" name="emailAddress" value="" id="emailAddress" class="small border-5 glow-shadow-2" autocomplete="off" onpaste="return false;" maxlength="320" tabindex="1" required="required" placeholder="Enter E-mail Address" />
<span class="inline-message " id="emailAddress-message"> <span class="tip-inline tip-default"></span>
<span class="tip-inline tip-information" style="display: none;">This will be the username you use to log in.</span>
<span class="tip-inline tip-warning" style="display: none;">Not a valid e-mail address.</span>
</span>
</span>
<span class="input-text input-text-small">
<input type="email" name="emailAddressConfirmation" value="" id="emailAddressConfirmation" class="small border-5 glow-shadow-2" autocomplete="off" onpaste="return false;" maxlength="320" tabindex="1" required="required" placeholder="Re-enter E-mail Address" />
<span class="inline-message " id="emailAddressConfirmation-message"> <span class="tip-inline tip-default"></span>
<span class="tip-inline tip-information" style="display: none;"></span>
<span class="tip-inline tip-warning" style="display: none;">E-mail addresses must match.</span>
</span>
</span>
</span>
</div>
<div class="input-row input-row-text">
<span class="input-left">
<label for="password">
<span class="label-text">
Password:
</span>
<span class="input-required">*</span>
</label>
</span><!--
--><span class="input-right">
<span class="input-text input-text-small">
<input type="password" id="password" name="password" value="" class="small border-5 glow-shadow-2" autocomplete="off" onpaste="return false;" maxlength="16" tabindex="1" required="required" placeholder="Enter Password" />
<span class="inline-message " id="password-message">&#160;</span>
</span>
<span class="input-text input-text-small">
<input type="password" id="rePassword" name="rePassword" value="" class="small border-5 glow-shadow-2" autocomplete="off" onpaste="return false;" maxlength="16" tabindex="1" required="required" placeholder="Re-enter Password" />
<span class="inline-message " id="rePassword-message">&#160;</span>
</span>
</span>
</div>
<div class="input-row input-row-note" id="password-strength" style="display: none">
<div class="input-note border-5 glow-shadow">
<div class="input-note-left">
<p class="caption">For your security, we highly recommend that you choose a unique password that you don’t use for any other online&#160;account.</p>
</div>
<div class="input-note-right border-5">
<div class="password-strength">
<span class="password-result">
Password Strength:
<strong id="password-result"></strong>
</span>
<span class="password-rating"><span class="rating rating-default" id="password-rating"></span></span>
</div>
<ul class="password-level" id="password-level">
<li id="password-level-0">
<span class="icon-16"></span>
<span class="icon-16-label">Your password must be between 8–16 characters in&#160;length.</span>
</li>
<li id="password-level-1">
<span class="icon-16"></span>
<span class="icon-16-label">Your password may only contain alphabetic characters (A–Z), numeric characters (0–9), and&#160;punctuation.</span>
</li>
<li id="password-level-2">
<span class="icon-16"></span>
<span class="icon-16-label">Your password must contain at least one alphabetic character and one numeric&#160;character.</span>
</li>
<li id="password-level-3">
<span class="icon-16"></span>
<span class="icon-16-label">Your password must not be similar to your account name.</span>
</li>
<li id="password-level-4">
<span class="icon-16"></span>
<span class="icon-16-label">Passwords must match.</span>
</li>
</ul>
</div>
<div class="clear"></div>
<div class="input-note-arrow"></div>
</div>
</div>
<div class="input-row input-row-select">
<span class="input-left">
<label for="question1">
<span class="label-text">
Secret Question &amp; Answer:
</span>
<span class="input-required">*</span>
</label>
</span><!--
--><span class="input-right">
<span class="input-select input-select-small">
<select name="question1" id="question1" class="small border-5 glow-shadow-2" tabindex="1" required="required">
<option value="" selected="selected">Select a Question</option>
<option value="19">What was the first car you owned?</option>
<option value="20">What was the street you lived on in high school?</option>
<option value="21">Where was the first place you flew?</option>
<option value="22">What was the first video game you beat?</option>
<option value="23">What was the name of your second pet?</option>
<option value="24">What is the name of your favorite sports team or player?</option>
</select>
</span>
<span class="input-text input-text-small">
<input type="text" name="answer1" value="" id="answer1" class="small border-5 glow-shadow-2" autocomplete="off" maxlength="100" tabindex="1" required="required" placeholder="Answer" />
</span>
</span>
</div>
<div class="input-row input-row-note question-info" id="question-info" style="margin-top: 0; min-height: 24px;">
<span class="inline-message">
<span class="tip-inline tip-default"></span>
<span class="tip-inline tip-information" style="display: none;">This information is used for account security related issues such as resetting your password.</span>
<span class="tip-inline tip-warning" style="display: none;"></span>
</span>
</div>
<div class="input-row input-row-text">
<span class="input-left">
<label for="agreedToChatPolicy">
<span class="label-text">Chat Agreement:</span>
<span class="input-required">*</span>
</label>
</span>
<span class="input-right">
<div class="agreement-check">
<p class="tou-desc">As part of the <?php echo TITLE ?> Server, <?php echo TITLE ?> provides various tools to allow you communicate between characters and characters of other players. As these communication tools do not constitute an electronic communication service (in legal terms), messages sent using them should not be considered private or personal. So be careful cause we keep an eye of what you are talking about. Illegal behavior and hacks will not be tolerated. Anything against the Server and the Gameplay or any other tool that makes the gameplay easier is considered a hack tool and your account will be suspended without consideration.</p>
</div>
</span>
</div>
<div class="input-row input-row-checkbox input-row-important">
<span class="input-left">
<span class="title-text">
</span>
<span class="input-required"></span>
</span><!--
--><span class="input-right">
<label for="agreedToChatPolicy">
<input type="checkbox" name="agreedToChatPolicy" value="true" id="agreedToChatPolicy" tabindex="1" required="required" />
<span class="label-text">
I consent to <?php echo TITLE ?> storing and reviewing both sent and received in-game chats and other messages.<span class="input-required">*</span>
</span>
</label>
</span>
<span class="input-left">
<span class="title-text">
</span>
<span class="input-required"></span>
</span><!--
--><span class="input-right">
<label for="agreedToToU">
<input type="checkbox" name="agreedToToU" value="true" id="agreedToToU" tabindex="1" required="required" />
<span class="label-text">
I accept the <a href="#" onclick="window.open(this.href); return false;">Terms of Use</a> applicable to my country of residence and if under 18 years old, agree and acknowledge that my parent or guardian has also reviewed and accepted the Terms of Use on my behalf.<span class="input-required">*</span>
</span>
</label>
</span>
</div>
<div class="submit-row">
<div class="input-left">&#160;</div>
<div class="input-right">
<button class="ui-button button1" type="submit" id="creation-submit" tabindex="1"><span class="button-left"><span class="button-right">Create Free Account</span></span></button>
<a class="ui-cancel "
href=""
tabindex="1">
<span>
Cancel </span>
</a>
</div>
</div>
<div class="form-block" id="country-change-overlay" style="display: none"></div>
</div>
<script type="text/javascript">
//<![CDATA[
var FormMsg = {
'headerSingular': 'Oops! This needs your attention:',
'headerMultiple': 'Oops! This needs your attention:',
'fieldMissing': 'This field is required.',
'fieldsMissing': 'Please fill in all required fields.',
'emailInfo': 'This will be the username you use to log in.',
'emailMissing': 'Please enter a valid e-mail address.',
'emailInvalid': 'Not a valid e-mail address.',
'emailMismatch': 'E-mail addresses must match.',
'passwordInvalid': 'Password does not meet guidelines.',
'passwordMismatch': 'Passwords must match.',
'tosDisagree': 'You must agree to this to continue.',
'taxInvoiceSelect': 'Please select a tax invoice option'
, 'emailError1': 'Not a valid e-mail address.'
, 'emailError2': 'E-mail addresses must match.'
, 'passwordError1': 'Password does not meet guidelines.'
, 'passwordError2': 'Passwords must match.'
, 'passwordStrength0': 'Too Short'
, 'passwordStrength1': 'Weak'
, 'passwordStrength2': 'Fair'
, 'passwordStrength3': 'Strong'
, 'errorsHeader': 'The following errors have occurred:'
, 'errorHeader': 'An error has occurred.'
, 'errorReq': 'This field is required.'
, 'errorMismatch': 'A field was entered incorrectly or was left blank.'
, 'errorEmail': 'Please enter a valid e-mail address.'
, 'errorPlease': 'Please fill in all required fields.'
, 'errorTerms': 'You must agree to this to continue.'
, 'errorChat': 'In order to continue, you must agree to the chat agreement.'
, 'errorAntiCheating': 'In order to continue, you must agree to the anti-cheating agreement.'
, 'selectCountry': 'You must select a Country of Residence.'
};
//]]>
</script>
</form>
</div>
<div class="templates">
<div class="alert error closeable border-4 glow-shadow" style=" " >
<div class="alert-inner">
<div class="alert-message">
<p class="title"><strong>Oops! This needs your attention:</strong></p>
</div>
</div>
<a class="alert-close" href="#" onclick="$(this).parent().fadeOut(250, function() { $(this).css({opacity:0}).animate({height: 0}, 100, function() { $(this).remove(); }); }); return false;">Close</a>
<span class="clear"><!-- --></span>
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