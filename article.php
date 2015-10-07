<!-- DO NOT TOUCH -->
<?php
require_once('system/config.php');

$account->AccountLoginQuery();

if (isset($_GET['id'])){
	$news = $connect->WebQuery("SELECT * FROM news WHERE id = '".$_GET['id']."'");
	$rows = $news->fetch_assoc();
	if (!$rows['id']){ 
		$error = true;
	}
}else{
	$error = true;
}
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
<title><?php echo $rows['title'].' - '.$rows['date'].' - '.TITLE ?></title>
<!-- The Styles & Javascripts of the CMS -->
<?php include(WEBKIT.'core.php'); ?>
<!-- The Styles & Javascripts of the CMS END -->
</head>
<body class="en-gb blog-article news">
<div id="wrapper">
	<!-- User Panel -->
	<?php include(WEBKIT.'userpanel.php'); ?>
	<!-- User Panel END -->
	<div id="header">
		<!-- Search -->
		<?php include(WEBKIT.'search.php'); ?>
		<!-- Search END -->
		<h1 id="logo"><a href="/wow/en/"><?php echo TITLE ?>
		</a></h1>
		<!-- Header -->
		<div class="header-plate">
			<?php
			$page = "menu-home";
			include(WEBKIT.'menu.php');
			include(WEBKIT.'userplate.php');
			?>
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
						<a href="/wow/en/blog/14014199/siege-of-orgrimmar-changes-in-patch-60-and-warlords-of-draenor-06-05-2014" rel="np" itemprop="url">
							<span class="breadcrumb-text" itemprop="name">Siege of Orgrimmar Changes in Patch 6.0 and Warlords of Draenor</span>
						</a>
					</li>
				</ol>
			</div>
			<div class="content-bot clear">
				<?php include (WEBKIT.'sidebar.php'); ?>
				<div class="left-content">
					<div id="blog" class="article-wrapper" itemscope="itemscope" itemtype="http://schema.org/BlogPosting">
						<h2 class="header-2"><span itemprop="headline">Siege of Orgrimmar Changes in Patch 6.0 and Warlords of Draenor</span></h2>
						<div class="article-meta">
							<a class="article-author" href="/wow/en/search?a=Blizzard%20Entertainment&amp;f=article">
								<span class="author-icon"></span>
									<span itemprop="author"><?php echo $rows['author']; ?>
								</span>
							</a>
							<span class="publish-date" title="06 May 2014 14:00 BST">06/05/2014 </span>
							<a href="#comments" class="comments-link"><?php echo $rows['comments']; ?></a>
						</div>
						<meta itemprop="datePublished" content="2014-05-06T14:00:00+01"/>
						<meta itemprop="dateModified" content="2014-05-06T14:17:18+01"/>
						<meta itemprop="inLanguage" content="en-GB"/>
						<meta itemprop="interactionCount" content="UserComments:106"/>
						<meta itemprop="thumbnailUrl" content="//bnetcmsus-a.akamaihd.net/cms/connect_thumbnail/471I1UWMFKPQ1384811769562.jpg"/>
						<div class="article-content">
							<div class="header-image">
								<img itemprop="image" alt="Siege of Orgrimmar Changes in Patch 6.0 and Warlords of Draenor" src="//bnetcmsus-a.akamaihd.net/cms/blog_header/B62ZF0FW1MFZ1384811756770.jpg"/>
							</div>
							<div class="detail" itemprop="articleBody">
								<?php echo  html_entity_decode($rows['content']); ?>
							</div>
						</div>
						<div class="community-share">
							<div class="share-wrapper">
								<div class="share-links">
									<a class="facebook" href="https://www.facebook.com/sharer.php?u=http://eu.battle.net/wow/en/blog/14014199/siege-of-orgrimmar-changes-in-patch-60-and-warlords-of-draenor-06-05-2014" onclick="Core.trackEvent('wow- SNS', 'Sharing - Facebook', 'blog 14014199 - en-gb'); window.open(this.href,'','height=450,width=550').focus(); return false;" title="Facebook"></a>
									<a class="twitter" href="http://twitter.com/share?http://eu.battle.net/wow/en/blog/14014199/siege-of-orgrimmar-changes-in-patch-60-and-warlords-of-draenor-06-05-2014" onclick="Core.trackEvent('wow- SNS', 'Sharing - Twitter', 'blog 14014199 - en-gb'); window.open(this.href,'','height=450,width=550').focus(); return false;" title="Twitter"></a>
									<a class="reddit" href="http://www.reddit.com/submit?url=http://eu.battle.net/wow/en/blog/14014199/siege-of-orgrimmar-changes-in-patch-60-and-warlords-of-draenor-06-05-2014" onclick="Core.trackEvent('wow- SNS', 'Sharing - Reddit', 'blog 14014199 - en-gb'); window.open(this.href,'','height=auto,width=auto').focus(); return false;" title="Reddit"></a>
									<span class="clear">
									<!-- -->
									</span>
								</div>
								<span class="share-title">Share:</span>
							</div>
							<div class="like-wrapper">
								<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://eu.battle.net/wow/en/blog/14014199/siege-of-orgrimmar-changes-in-patch-60-and-warlords-of-draenor-06-05-2014" data-lang="en" data-text="Siege of Orgrimmar Changes in Patch 6.0 and Warlords of Draenor" data-hashtags="wow">Tweet</a>
								<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
							</div>
							<script type="text/javascript">
							//<![CDATA[
							Core.appendFrame("https://www.facebook.com/plugins/like.php?href=http://eu.battle.net/wow/en/blog/14014199/siege-of-orgrimmar-changes-in-patch-60-and-warlords-of-draenor-06-05-2014&amp;layout=button_count&amp;show_faces=false&amp;width=200&amp;height=20&amp;action=like&amp;font=arial&amp;colorscheme=light&amp;locale=en_GB", 200, 20, $('.like-wrapper'), "facebook-like");
							//]]>
							</script>
							<span class="clear">
							<!-- -->
							</span>
						</div>
						<div class="keyword-list">
							<strong>Tags:</strong>
							<a href="/wow/en/search?k=warlords&amp;f=article">warlords</a>, <a href="/wow/en/search?k=siege%20of%20orgrimmar&amp;f=article">siege of orgrimmar</a>, <a href="/wow/en/search?k=6.0%20systems%20patch&amp;f=article">6.0 systems patch</a>
						</div>
					</div>
					<div id="comments" class="bnet-comments ">
						<h2 class="subheader-2">Loading Comments…</h2>
						<h2 class="hide">An error has occurred loading comments.</h2>
						<div class="comments-loading">
						</div>
						<script type="text/javascript">
						//<![CDATA[
						$(function() {
						Comments.initialize('eu.en_gb.blog.14014199', '2f92a1439664ab2b2f960a9e898adff3', '0');
						});
						//]]>
						</script>
					</div>
				</div>
				<span class="clear">
				<!-- -->
				</span>
				<script type="text/javascript">
				//<![CDATA[
				$(function() {
				Blog.init();
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