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
<title>Videos - Media - <?php echo TITLE ?></title>
<link rel="shortcut icon" href="<?php echo BASE_URL ?>assets/images/logos/favicon.png" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo BASE_URL ?>assets/css/common-game-site.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo BASE_URL ?>assets/css/wow.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo BASE_URL ?>assets/css/lightbox.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo BASE_URL ?>assets/css/media/media-gallery.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo BASE_URL ?>assets/css/media/media.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo BASE_URL ?>assets/css/cms/comments.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo BASE_URL ?>assets/css/cms.css" />
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
<a href="#" rel="np" class="breadcrumb-arrow" itemprop="url">
<span class="breadcrumb-text" itemprop="name">World of Warcraft</span>
</a>
</li>
<li itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
<a href="#" rel="np" class="breadcrumb-arrow" itemprop="url">
<span class="breadcrumb-text" itemprop="name">Media</span>
</a>
</li>
<li class="last" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
<a href="#" rel="np" itemprop="url">
<span class="breadcrumb-text" itemprop="name">Videos</span>
</a>
</li>
</ol>
</div>
<div class="content-bot clear"> <div class="media-content">
<div class="currently-viewing">
<a id="toggle-thumbnail-page" href="#" data-tooltip="Switch to large thumbnail view"
class="view-link float-right"></a>
<a id="toggle-film-strip" href="#" data-tooltip="Switch to filmstrip view"
class="view-link active float-right"></a> <div>
<div class="ui-dropdown filter-dropdown">
<a class="dropdown-toggler" href="javascript:;">
<span>Filter Options</span>
</a>
<div id="filter-options" class="dropdown-wrapper" style="display: none;">
<div class="filter-title">Filter Options</div>
<a id="keyword-cinematic" class="keyword-filter" data-keyword="cinematic" href="javascript:;">
<span class="checkbox"></span>
Cinematic
</a>
<a id="keyword-commerical" class="keyword-filter" data-keyword="commerical" href="javascript:;">
<span class="checkbox"></span>
Commercial
</a>
<a id="keyword-cs" class="keyword-filter" data-keyword="cs" href="javascript:;">
<span class="checkbox"></span>
Blizzard Customer Support
</a>
<a id="keyword-trailer" class="keyword-filter" data-keyword="trailer" href="javascript:;">
<span class="checkbox"></span>
General
</a>
<span class="clear"><!-- --></span>
<div class="apply-filters">
<button class="ui-button button2 apply-filter" type="submit"><span class="button-left"><span class="button-right">Apply Filters</span></span></button>
<button class="ui-button button2 cancel-filter" type="submit"><span class="button-left"><span class="button-right">Cancel</span></span></button>
<span class="clear"><!-- --></span>
</div>
</div>
</div>
<div class="filter-details">
<div class="float-left">Current Filters:</div>
None
<span class="filter-note">(Add filters to narrow down results)</span>
<span class="clear"><!-- --></span>
<div id="keyword-list" data-keywords="" style="display:none"></div>
</div>
</div>
</div>
<!-- LE PLAYER -->
<script type="text/javascript">
//<![CDATA[
var galleryType = "videos";
var dataKey = "videos";
var viewType = "film-strip";
var discussionKeys = ["eu.en_gb.wowmedia.videos.warlords_of_draenor_wish_you_were_here", "eu.en_gb.wowmedia.videos.warlords_of_draenor_character_boost", "eu.en_gb.wowmedia.videos.warlords_of_draenor_announcement", "eu.en_gb.wowmedia.videos.warlords_of_draenor_faction_zones", "eu.en_gb.wowmedia.videos.patch_5_4", "eu.en_gb.wowmedia.videos.patch_5_2_reveal", "eu.en_gb.wowmedia.videos.landfall", "eu.en_gb.wowmedia.videos.cs_solving_problems", "eu.en_gb.wowmedia.videos.cs_add_a_key", "eu.en_gb.wowmedia.videos.cs_gm", "eu.en_gb.wowmedia.videos.patch_5_2", "eu.en_gb.wowmedia.videos.mists_best_expansion_commercial", "eu.en_gb.wowmedia.videos.anniversary_eight_year", "eu.en_gb.wowmedia.videos.mists_developers_discuss_release", "eu.en_gb.wowmedia.videos.mists_30_commercial", "eu.en_gb.wowmedia.videos.pet_battles", "eu.en_gb.wowmedia.videos.mists_cinematic", "eu.en_gb.wowmedia.videos.patch_5_0", "eu.en_gb.wowmedia.videos.battle_net_sms_protect", "eu.en_gb.wowmedia.videos.battle_net_balance", "eu.en_gb.wowmedia.videos.item_restoration", "eu.en_gb.wowmedia.videos.recruit_a_friend", "eu.en_gb.wowmedia.videos.help_i_got_hacked", "eu.en_gb.wowmedia.videos.hour_of_twilight", "eu.en_gb.wowmedia.videos.mists_of_pandaria_reveal", "eu.en_gb.wowmedia.videos.rage_of_the_firelands", "eu.en_gb.wowmedia.videos.zandalari", "eu.en_gb.wowmedia.videos.cataclysm_intro", "eu.en_gb.wowmedia.videos.cataclysm_tv_spot", "eu.en_gb.wowmedia.videos.cataclysm_worldreborn", "eu.en_gb.wowmedia.videos.cataclysm_reveal", "eu.en_gb.wowmedia.videos.wrath_ending", "eu.en_gb.wowmedia.videos.fall_of_the_lich_king", "eu.en_gb.wowmedia.videos.call_of_the_crusade", "eu.en_gb.wowmedia.videos.ulduar", "eu.en_gb.wowmedia.videos.wrathgate", "eu.en_gb.wowmedia.videos.wrath_cinematic", "eu.en_gb.wowmedia.videos.wrath_reveal", "eu.en_gb.wowmedia.videos.sunwell", "eu.en_gb.wowmedia.videos.zulaman", "eu.en_gb.wowmedia.videos.black_temple", "eu.en_gb.wowmedia.videos.lament_of_the_highborne", "eu.en_gb.wowmedia.videos.burning_crusade_cinematic", "eu.en_gb.wowmedia.videos.naxxramas", "eu.en_gb.wowmedia.videos.ahn_qiraj", "eu.en_gb.wowmedia.videos.blackwing_lair", "eu.en_gb.wowmedia.videos.wow_cinematic", "eu.en_gb.wowmedia.videos.war3x", "eu.en_gb.wowmedia.videos.war3", "eu.en_gb.wowmedia.videos.war2x", "eu.en_gb.wowmedia.videos.war2", "eu.en_gb.wowmedia.videos.war1"];
var discussionSigs = ["664fc03d753730a85b8c27ef87572007", "f0451f61dddbc379461b7d90fa5719b6", "38f758e9538ee4dd7613e1fc07be0181", "58a11c993e0986170cc51a478c1a0055", "c5fe66f298ad7bbd91b1246f110d2000", "9ae8814ed354085837432dc0678d8d1b", "622575f28ff00222a2d8182643bbff89", "9fb4bf39972797bbb0336b45ae3197c0", "ad0116d17c0b3821b064b5a9c0b0f820", "3242c831a9f27d23964bb875ee2026c5", "dcfccf36ed5c910ba1720457838e4ede", "68e03f1195d943dd194c2e7fa6df55f9", "916a5bf2d989909166d1e83d1eca39b5", "849488085c780ddaaa2e9119bc31de1d", "1973ee3918d4be0ec59c73e1f3a4dc34", "576cc01047d05dbff4cd8baa39241a1a", "8c2b3a4d09c164983c9a34416e00b1f7", "8a73edc591b983a72a0202b47b8cdcaf", "cea9c7f44bf83047101c9e2a7cf23638", "0a89bf5fec5c253eaeefbece5ac38d91", "1b09862b7b0ac466edcf0b944f8b6a2a", "c185f448fc1296ed8143dadf53655558", "627dc98f8611d4503a6e720d7d411de0", "04c3f16b7047e7b53a651fab8e57df91", "0aadc9f9f7347eecbf31e1cde96a9bbb", "8c3deaef963ac3a851f783778224bc47", "df1e6a570c9d12265d536137929e2072", "9b9bd103b1b6148ae98f70d08a7eeeec", "93496d2dfb8efc7c753a6b1cc2048de0", "f0fb9336147e90821a74c081d3b7315d", "4740913a52887d8688d32be67d1c3f82", "02747524c9fd612f6486187541d37c77", "ea39bec9eaebbf8534a8cb71080fa280", "59ed26f6e2aa4517aae3445001edfcb0", "30524ec5ae02adc3f705ae14c6de9982", "c5d5ae5cc801a988b798424253e8d43b", "28c0d42a5a0fbdfab0f6aabb3f7e70e2", "20bafa00e377915be154155b56b1a762", "16a79de189771baa42c0377afc898f90", "4a21490becd90ce18ba0b053c8a7490d", "453f1f374d9f499f2ebba87b0637722b", "1739ada076be491dc9fca4d75ac4f7e9", "7effb4faafa86881f86cf13bac555af4", "8ec1e3e066e00a1d81d9f31510da1252", "9513c3e30fff7c44f883db2fc3c244fb", "b4c3a13c54f211ec334be17dfbe2c845", "15dc2f596e7472339137e1799dac3479", "16af5dd2522971ff1d09c351f939b850", "f11ddfff3a97a0953627a632ae566e5a", "d4135f247f2dffa1c0c451c7a9b3232a", "42addc8bada370d9c0ebe9bfd0b000e2", "5cedec9f3a224c0e5e5f907c2dd61686"];
var indices = ["warlords-of-draenor-wish-you-were-here", "warlords-of-draenor-character-boost", "warlords-of-draenor-announcement", "warlords-of-draenor-faction-zones", "patch-5-4", "patch-5-2-reveal", "landfall", "cs-solving-problems", "cs-add-a-key", "cs-gm", "patch-5-2", "mists-best-expansion-commercial", "anniversary-eight-year", "mists-developers-discuss-release", "mists-30-commercial", "pet-battles", "mists-cinematic", "patch-5-0", "battle-net-sms-protect", "battle-net-balance", "item-restoration", "recruit-a-friend", "help-i-got-hacked", "hour-of-twilight", "mists-of-pandaria-reveal", "rage-of-the-firelands", "zandalari", "cataclysm-intro", "cataclysm-tv-spot", "cataclysm-worldreborn", "cataclysm-reveal", "wrath-ending", "fall-of-the-lich-king", "call-of-the-crusade", "ulduar", "wrathgate", "wrath-cinematic", "wrath-reveal", "sunwell", "zulaman", "black-temple", "lament-of-the-highborne", "burning-crusade-cinematic", "naxxramas", "ahn-qiraj", "blackwing-lair", "wow-cinematic", "war3x", "war3", "war2x", "war2", "war1"];
var itemPaths = ["http://media.blizzard.com/wow/media/videos/warlords-of-draenor-wish-you-were-here/warlords-of-draenor-wish-you-were-here", "http://media.blizzard.com/wow/media/videos/warlords-of-draenor-character-boost/warlords-of-draenor-character-boost", "http://media.blizzard.com/wow/media/videos/warlords-of-draenor-announcement/warlords-of-draenor-announcement", "http://media.blizzard.com/wow/media/videos/warlords-of-draenor-faction-zones/warlords-of-draenor-faction-zones", "http://media.blizzard.com/wow/media/videos/patch-5-4/patch-5-4", "http://media.blizzard.com/wow/media/videos/patch-5-2-reveal/patch-5-2-reveal", "http://media.blizzard.com/wow/media/videos/landfall/landfall", "http://media.blizzard.com/wow/media/videos/cs-solving-problems/cs-solving-problems", "http://media.blizzard.com/wow/media/videos/cs-add-a-key/cs-add-a-key", "http://media.blizzard.com/wow/media/videos/cs-gm/cs-gm", "http://media.blizzard.com/wow/media/videos/patch-5-2/patch-5-2", "http://media.blizzard.com/wow/media/videos/mists-best-expansion-commercial/mists-best-expansion-commercial", "http://media.blizzard.com/wow/media/videos/anniversary-eight-year/anniversary-eight-year", "http://media.blizzard.com/wow/media/videos/mists-developers-discuss-release/mists-developers-discuss-release", "http://media.blizzard.com/wow/media/videos/mists-30-commercial/mists-30-commercial", "http://media.blizzard.com/wow/media/videos/pet-battles/pet-battles", "http://media.blizzard.com/wow/media/videos/mists-cinematic/mists-cinematic", "http://media.blizzard.com/wow/media/videos/patch-5-0/patch-5-0", "http://media.blizzard.com/wow/media/videos/battle-net-sms-protect/battle-net-sms-protect", "http://media.blizzard.com/wow/media/videos/battle-net-balance/battle-net-balance", "http://media.blizzard.com/wow/media/videos/item-restoration/item-restoration", "http://media.blizzard.com/wow/media/videos/recruit-a-friend/recruit-a-friend", "http://media.blizzard.com/wow/media/videos/help-i-got-hacked/help-i-got-hacked", "http://media.blizzard.com/wow/media/videos/hour-of-twilight/hour-of-twilight", "http://media.blizzard.com/wow/media/videos/mists-reveal/mists-of-pandaria-reveal", "http://media.blizzard.com/wow/media/videos/rage-of-the-firelands/rage-of-the-firelands", "http://media.blizzard.com/wow/media/videos/zandalari/zandalari", "http://media.blizzard.com/wow/media/videos/cataclysm-intro/cataclysm-intro", "http://media.blizzard.com/wow/media/videos/cataclysm-tv-spot/cataclysm-tv-spot", "http://media.blizzard.com/wow/media/videos/cataclysm-worldreborn/cataclysm-worldreborn", "http://media.blizzard.com/wow/media/videos/cataclysm-reveal/cataclysm-reveal", "http://media.blizzard.com/wow/media/videos/wrath-ending/wrath-ending", "http://media.blizzard.com/wow/media/videos/fall-of-the-lich-king/fall-of-the-lich-king", "http://media.blizzard.com/wow/media/videos/call-of-the-crusade/call-of-the-crusade", "http://media.blizzard.com/wow/media/videos/ulduar/ulduar", "http://media.blizzard.com/wow/media/videos/wrathgate/wrathgate", "http://media.blizzard.com/wow/media/videos/wrath-cinematic/wrath-cinematic", "http://media.blizzard.com/wow/media/videos/wrath-reveal/wrath-reveal", "http://media.blizzard.com/wow/media/videos/sunwell/sunwell", "http://media.blizzard.com/wow/media/videos/zulaman/zulaman", "http://media.blizzard.com/wow/media/videos/black-temple/black-temple", "http://media.blizzard.com/wow/media/videos/lament-of-the-highborne/lament-of-the-highborne", "http://media.blizzard.com/wow/media/videos/burning-crusade-cinematic/burning-crusade-cinematic", "http://media.blizzard.com/wow/media/videos/naxxramas/naxxramas", "http://media.blizzard.com/wow/media/videos/ahn-qiraj/ahn-qiraj", "http://media.blizzard.com/wow/media/videos/blackwing-lair/blackwing-lair", "http://media.blizzard.com/wow/media/videos/wow-cinematic/wow-cinematic", "http://media.blizzard.com/wow/media/videos/war3x/war3x", "http://media.blizzard.com/wow/media/videos/war3/war3", "http://media.blizzard.com/wow/media/videos/war2x/war2x", "http://media.blizzard.com/wow/media/videos/war2/war2", "http://media.blizzard.com/wow/media/videos/war1/war1" ];
var videoData = [{ flv: "/warlords-of-draenor-wish-you-were-here/warlords-of-draenor-wish-you-were-here-en_GB", w:704, h:299, captionsPath:"", customRating:"http://media.blizzard.com/global-video-player/ratings-png/pegi-12.png" }, { flv: "/warlords-of-draenor-character-boost/warlords-of-draenor-character-boost-en_GB.flv", w:704, h:299, captionsPath:"", customRating:"http://media.blizzard.com/global-video-player/ratings-png/pegi-12.png" }, { flv: "/warlords-of-draenor-announcement/warlords-of-draenor-announcement-en_GB.flv", w:704, h:299, captionsPath:"", customRating:"http://media.blizzard.com/global-video-player/ratings-png/pegi-12.png" }, { flv: "/warlords-of-draenor-faction-zones/warlords-of-draenor-faction-zones-en_GB.flv", w:704, h:299, captionsPath:"", customRating:"http://media.blizzard.com/global-video-player/ratings-png/pegi-12.png" }, { flv: "/patch-5-4/patch-5-4-en_GB.flv", w:704, h:299, captionsPath:"", customRating:"http://media.blizzard.com/global-video-player/ratings-png/pegi-12.png" }, { flv: "/patch-5-2-reveal/patch-5-2-reveal-en_US.flv", w:704, h:299, captionsPath:"", customRating:"http://media.blizzard.com/global-video-player/ratings-png/pegi-12.png" }, { flv: "/landfall/landfall-en_US.flv", w:704, h:299, captionsPath:"", customRating:"http://media.blizzard.com/global-video-player/ratings-png/pegi-12.png" }, { flv: "/cs-solving-problems/cs-solving-problems-en_US.flv", w:704, h:299, captionsPath:"", customRating:"http://media.blizzard.com/global-video-player/ratings-png/pegi-12.png" }, { flv: "/cs-add-a-key/cs-add-a-key-en_US.flv", w:704, h:299, captionsPath:"", customRating:"http://media.blizzard.com/global-video-player/ratings-png/pegi-12.png" }, { flv: "/cs-gm/cs-gm-en_US.flv", w:704, h:299, captionsPath:"", customRating:"http://media.blizzard.com/global-video-player/ratings-png/pegi-12.png" }, { flv: "/patch-5-2/patch-5-2-en_US.flv", w:704, h:299, captionsPath:"", customRating:"http://media.blizzard.com/global-video-player/ratings-png/pegi-12.png" }, { flv: "/mists-best-expansion-commercial/mists-best-expansion-commercial-en_US.flv", w:704, h:299, captionsPath:"", customRating:"http://media.blizzard.com/global-video-player/ratings-png/pegi-12.png" }, { flv: "/anniversary-eight-year/anniversary-eight-year-en_US.flv", w:704, h:299, captionsPath:"", customRating:"http://media.blizzard.com/global-video-player/ratings-png/pegi-12.png" }, { flv: "/mists-developers-discuss-release/mists-developers-discuss-release_US.flv", w:704, h:299, captionsPath:"", customRating:"http://media.blizzard.com/global-video-player/ratings-png/pegi-12.png" }, { flv: "/mists-30-commercial/mists-30-commercial-en_US.flv", w:704, h:299, captionsPath:"", customRating:"http://media.blizzard.com/global-video-player/ratings-png/pegi-12.png" }, { flv: "/pet-battles/pet-battles-en_US.flv", w:704, h:299, captionsPath:"", customRating:"http://media.blizzard.com/global-video-player/ratings-png/pegi-12.png" }, { flv: "/mists-cinematic/mists-cinematic-en_US.flv", w:704, h:398, captionsPath:"", customRating:"http://media.blizzard.com/global-video-player/ratings-png/pegi-12.png" }, { flv: "/patch-5-0/patch-5-0-en_US.flv", w:704, h:299, captionsPath:"", customRating:"http://media.blizzard.com/global-video-player/ratings-png/pegi-12.png" }, { flv: "/battle-net-sms-protect/battle.net-sms-protect-en_US.flv", w:704, h:299, captionsPath:"", customRating:"http://media.blizzard.com/global-video-player/ratings-png/pegi-12.png" }, { flv: "/battle-net-balance/battle-net-balance-en_US.flv", w:704, h:299, captionsPath:"", customRating:"http://media.blizzard.com/global-video-player/ratings-png/pegi-12.png" }, { flv: "/item-restoration/item-restoration-en_US.flv", w:704, h:299, captionsPath:"", customRating:"http://media.blizzard.com/global-video-player/ratings-png/pegi-12.png" }, { flv: "/recruit-a-friend/recruit-a-friend-en_US.flv", w:704, h:299, captionsPath:"", customRating:"http://media.blizzard.com/global-video-player/ratings-png/pegi-12.png" }, { flv: "/help-i-got-hacked/help-i-got-hacked-en_US.flv", w:704, h:299, captionsPath:"", customRating:"http://media.blizzard.com/global-video-player/ratings-png/pegi-12.png" }, { flv: "/hour-of-twilight/hour-of-twilight-en_US.flv", w:704, h:398, captionsPath:"", customRating:"http://media.blizzard.com/global-video-player/ratings-png/pegi-12.png" }, { flv: "/mists-reveal/mists-reveal-en_US.flv", w:704, h:396, captionsPath:"http://media.blizzard.com/wow/media/videos/mists-reveal/captions/en-gb.xml", customRating:"http://media.blizzard.com/global-video-player/ratings-png/blizzard-logo.png" }, { flv: "/rage-of-the-firelands/rage-of-the-firelands-en_US.flv", w:704, h:398, captionsPath:"", customRating:"http://media.blizzard.com/global-video-player/ratings-png/pegi-12.png" }, { flv: "/zandalari/zandalari-en_US.flv", w:704, h:398, captionsPath:"", customRating:"http://media.blizzard.com/global-video-player/ratings-png/pegi-12.png" }, { flv: "/cataclysm-intro/cataclysm-intro-en_GB.flv", w:704, h:299, captionsPath:"", customRating:"http://media.blizzard.com/global-video-player/ratings-png/pegi-12.png" }, { flv: "/cataclysm-tv-spot/cataclysm_tvspot_en-GB.flv", w:704, h:291, captionsPath:"", customRating:"http://media.blizzard.com/global-video-player/ratings-png/pegi-12.png" }, { flv: "/cataclysm-worldreborn/cataclysm-worldreborn_en-US.flv", w:704, h:397, captionsPath:"", customRating:"http://media.blizzard.com/global-video-player/ratings-png/pegi-12.png" }, { flv: "/cataclysm-reveal/cataclysm-reveal-en_US.flv", w:704, h:397, captionsPath:"", customRating:"http://media.blizzard.com/global-video-player/ratings-png/pegi-12.png" }, { flv: "/wrath-ending/wrath-ending-en_GB.flv", w:704, h:397, captionsPath:"", customRating:"http://media.blizzard.com/global-video-player/ratings-png/pegi-12.png" }, { flv: "/fall-of-the-lich-king/fall-of-the-lich-king-en_GB.flv", w:704, h:397, captionsPath:"", customRating:"http://media.blizzard.com/global-video-player/ratings-png/pegi-12.png" }, { flv: "/call-of-the-crusade/call-of-the-crusade-en_GB.flv", w:704, h:397, captionsPath:"", customRating:"http://media.blizzard.com/global-video-player/ratings-png/pegi-12.png" }, { flv: "/ulduar/ulduar-en_GB.flv", w:704, h:397, captionsPath:"", customRating:"http://media.blizzard.com/global-video-player/ratings-png/pegi-12.png" }, { flv: "/wrathgate/wrathgate-en_GB.flv", w:704, h:397, captionsPath:"", customRating:"http://media.blizzard.com/global-video-player/ratings-png/pegi-12.png" }, { flv: "/wrath-cinematic/wrath-cinematic-en_GB.flv", w:704, h:397, captionsPath:"", customRating:"http://media.blizzard.com/global-video-player/ratings-png/pegi-12.png" }, { flv: "/wrath-reveal/wrath-reveal-en_GB.flv", w:704, h:397, captionsPath:"", customRating:"http://media.blizzard.com/global-video-player/ratings-png/pegi-12.png" }, { flv: "/sunwell/sunwell-en_US.flv", w:704, h:397, captionsPath:"", customRating:"http://media.blizzard.com/global-video-player/ratings-png/pegi-12.png" }, { flv: "/zulaman/zulaman-en_US.flv", w:704, h:397, captionsPath:"", customRating:"http://media.blizzard.com/global-video-player/ratings-png/pegi-12.png" }, { flv: "/black-temple/black-temple-en_US.flv", w:704, h:397, captionsPath:"", customRating:"http://media.blizzard.com/global-video-player/ratings-png/pegi-12.png" }, { flv: "/lament-of-the-highborne/lament-of-the-highborne-en_US.flv", w:704, h:397, captionsPath:"", customRating:"http://media.blizzard.com/global-video-player/ratings-png/pegi-12.png" }, { flv: "/burning-crusade-cinematic/burning-crusade-cinematic-en_GB.flv", w:704, h:299, captionsPath:"", customRating:"http://media.blizzard.com/global-video-player/ratings-png/pegi-12.png" }, { flv: "/naxxramas/naxxramas-en_US.flv", w:704, h:397, captionsPath:"", customRating:"http://media.blizzard.com/global-video-player/ratings-png/pegi-12.png" }, { flv: "/ahn-qiraj/ahn-qiraj-en_US.flv", w:704, h:299, captionsPath:"", customRating:"http://media.blizzard.com/global-video-player/ratings-png/pegi-12.png" }, { flv: "/blackwing-lair/blackwing-lair-en_US.flv", w:704, h:299, captionsPath:"", customRating:"http://media.blizzard.com/global-video-player/ratings-png/pegi-12.png" }, { flv: "/wow-cinematic/wow-cinematic-en_GB.flv", w:704, h:299, captionsPath:"", customRating:"http://media.blizzard.com/global-video-player/ratings-png/pegi-12.png" }, { flv: "/war3x/war3x-en_US.flv", w:704, h:396, captionsPath:"", customRating:"http://media.blizzard.com/global-video-player/ratings-png/pegi-12.png" }, { flv: "/war3/war3-en_US.flv", w:704, h:396, captionsPath:"", customRating:"http://media.blizzard.com/global-video-player/ratings-png/pegi-12.png" }, { flv: "/war2x/war2x-en_US.flv", w:656, h:486, captionsPath:"", customRating:"http://media.blizzard.com/global-video-player/ratings-png/pegi-12.png" }, { flv: "/war2/war2-en_US.flv", w:704, h:470, captionsPath:"", customRating:"http://media.blizzard.com/global-video-player/ratings-png/pegi-12.png" }, { flv: "/war1/war1-full-en_US.flv", w:704, h:470, captionsPath:"", customRating:"http://media.blizzard.com/global-video-player/ratings-png/pegi-12.png" } ];
//]]>
</script>
<!-- LE PLAYER END -->
<div itemscope="itemscope" itemprop="video" itemtype="http://schema.org/VideoObject">
<div class="film-strip-wrapper">
<div id="film-strip">
<div class="viewport-scrollbar">
<div class="track">
<div id="scroll-thumb" class="thumb"><div class="thumb-bot"></div></div>
</div>
</div>
<div class="viewport-content">
<div id="film-strip-thumbnails" class="video-thumbnails">
<a id="warlords-of-draenor-wish-you-were-here" data-tooltip="Warlords of Draenor Trailer: Wish You Were Here "
data-item-key="warlords-of-draenor-wish-you-were-here"
data-item-index="0"
data-gallery-type="videos"
class="film-strip-thumb-wrapper" style="background-image:url(http://media.blizzard.com/wow/media/videos/warlords-of-draenor-wish-you-were-here/warlords-of-draenor-wish-you-were-here-small.jpg)"
href="?view=warlords-of-draenor-wish-you-were-here"
itemProf="isPartOf">
<span class="film-strip-thumb-frame"></span>
</a>
<a id="warlords-of-draenor-character-boost" data-tooltip="Warlords of Draenor Pre-Purchase Character Boost Tutorial "
data-item-key="warlords-of-draenor-character-boost"
data-item-index="1"
data-gallery-type="videos"
class="film-strip-thumb-wrapper" style="background-image:url(http://media.blizzard.com/wow/media/videos/warlords-of-draenor-character-boost/warlords-of-draenor-character-boost-small.jpg)"
href="?view=warlords-of-draenor-character-boost"
itemProf="isPartOf">
<span class="film-strip-thumb-frame"></span>
</a>
<a id="warlords-of-draenor-announcement" data-tooltip="World of Warcraft: Warlords of Draenor Announcement Trailer "
data-item-key="warlords-of-draenor-announcement"
data-item-index="2"
data-gallery-type="videos"
class="film-strip-thumb-wrapper" style="background-image:url(http://media.blizzard.com/wow/media/videos/warlords-of-draenor-announcement/warlords-of-draenor-announcement-small.jpg)"
href="?view=warlords-of-draenor-announcement"
itemProf="isPartOf">
<span class="film-strip-thumb-frame"></span>
</a>
<a id="warlords-of-draenor-faction-zones" data-tooltip="Warlords of Draenor: Faction Zones"
data-item-key="warlords-of-draenor-faction-zones"
data-item-index="3"
data-gallery-type="videos"
class="film-strip-thumb-wrapper" style="background-image:url(http://media.blizzard.com/wow/media/videos/warlords-of-draenor-faction-zones/warlords-of-draenor-faction-zones-small.jpg)"
href="?view=warlords-of-draenor-faction-zones"
itemProf="isPartOf">
<span class="film-strip-thumb-frame"></span>
</a>
<a id="patch-5-4" data-tooltip="Patch 5.4: Siege of Orgrimmar "
data-item-key="patch-5-4"
data-item-index="4"
data-gallery-type="videos"
class="film-strip-thumb-wrapper" style="background-image:url(http://media.blizzard.com/wow/media/videos/patch-5-4/patch-5-4-small.jpg)"
href="?view=patch-5-4"
itemProf="isPartOf">
<span class="film-strip-thumb-frame"></span>
</a>
<a id="patch-5-2-reveal" data-tooltip="Patch 5.2: The Thunder King "
data-item-key="patch-5-2-reveal"
data-item-index="5"
data-gallery-type="videos"
class="film-strip-thumb-wrapper" style="background-image:url(http://media.blizzard.com/wow/media/videos/patch-5-2-reveal/patch-5-2-reveal-small.jpg)"
href="?view=patch-5-2-reveal"
itemProf="isPartOf">
<span class="film-strip-thumb-frame"></span>
</a>
<a id="landfall" data-tooltip="Patch 5.1: Landfall"
data-item-key="landfall"
data-item-index="6"
data-gallery-type="videos"
class="film-strip-thumb-wrapper" style="background-image:url(http://media.blizzard.com/wow/media/videos/landfall/landfall-small.jpg)"
href="?view=landfall"
itemProf="isPartOf">
<span class="film-strip-thumb-frame"></span>
</a>
<a id="cs-solving-problems" data-tooltip="Solve most technical issues in under a minute"
class="film-strip-thumb-wrapper thumbnail-loader scroll-content-item"
data-item-key="cs-solving-problems"
data-item-index="7"
data-gallery-type="videos"
href="?view=cs-solving-problems"
itemProf="isPartOf">
<span class="film-strip-thumb-frame" data-thumbsrc="http://media.blizzard.com/wow/media/videos/cs-solving-problems/cs-solving-problems-small.jpg"> </span>
</a>
<a id="cs-add-a-key" data-tooltip="Adding a game key, pet/mount or code "
class="film-strip-thumb-wrapper thumbnail-loader scroll-content-item"
data-item-key="cs-add-a-key"
data-item-index="8"
data-gallery-type="videos"
href="?view=cs-add-a-key"
itemProf="isPartOf">
<span class="film-strip-thumb-frame" data-thumbsrc="http://media.blizzard.com/wow/media/videos/cs-add-a-key/cs-add-a-key-small.jpg"> </span>
</a>
<a id="cs-gm" data-tooltip="What do Game Masters really do?"
class="film-strip-thumb-wrapper thumbnail-loader scroll-content-item"
data-item-key="cs-gm"
data-item-index="9"
data-gallery-type="videos"
href="?view=cs-gm"
itemProf="isPartOf">
<span class="film-strip-thumb-frame" data-thumbsrc="http://media.blizzard.com/wow/media/videos/cs-gm/cs-gm-small.jpg"> </span>
</a>
<a id="patch-5-2" data-tooltip="Patch 5.2: The Thunder King Teaser"
class="film-strip-thumb-wrapper thumbnail-loader scroll-content-item"
data-item-key="patch-5-2"
data-item-index="10"
data-gallery-type="videos"
href="?view=patch-5-2"
itemProf="isPartOf">
<span class="film-strip-thumb-frame" data-thumbsrc="http://media.blizzard.com/wow/media/videos/patch-5-2/patch-5-2-small.jpg"> </span>
</a>
<a id="mists-best-expansion-commercial" data-tooltip="Mists of Pandaria &quot;Best Expansion&quot; TV Commercial "
class="film-strip-thumb-wrapper thumbnail-loader scroll-content-item"
data-item-key="mists-best-expansion-commercial"
data-item-index="11"
data-gallery-type="videos"
href="?view=mists-best-expansion-commercial"
itemProf="isPartOf">
<span class="film-strip-thumb-frame" data-thumbsrc="http://media.blizzard.com/wow/media/videos/mists-best-expansion-commercial/mists-best-expansion-commercial-small.jpg"> </span>
</a>
<a id="anniversary-eight-year" data-tooltip="World of Warcraft - 8 Year Anniversary"
class="film-strip-thumb-wrapper thumbnail-loader scroll-content-item"
data-item-key="anniversary-eight-year"
data-item-index="12"
data-gallery-type="videos"
href="?view=anniversary-eight-year"
itemProf="isPartOf">
<span class="film-strip-thumb-frame" data-thumbsrc="http://media.blizzard.com/wow/media/videos/anniversary-eight-year/anniversary-eight-year-small.jpg"> </span>
</a>
<a id="mists-developers-discuss-release" data-tooltip="Blizzard Devs Discuss the Mists of Pandaria Release "
class="film-strip-thumb-wrapper thumbnail-loader scroll-content-item"
data-item-key="mists-developers-discuss-release"
data-item-index="13"
data-gallery-type="videos"
href="?view=mists-developers-discuss-release"
itemProf="isPartOf">
<span class="film-strip-thumb-frame" data-thumbsrc="http://media.blizzard.com/wow/media/videos/mists-developers-discuss-release/mists-developers-discuss-release-small.jpg"> </span>
</a>
<a id="mists-30-commercial" data-tooltip="World of Warcraft: Mists of Pandaria TV Spot"
class="film-strip-thumb-wrapper thumbnail-loader scroll-content-item"
data-item-key="mists-30-commercial"
data-item-index="14"
data-gallery-type="videos"
href="?view=mists-30-commercial"
itemProf="isPartOf">
<span class="film-strip-thumb-frame" data-thumbsrc="http://media.blizzard.com/wow/media/videos/mists-30-commercial/mists-30-commercial-small.jpg"> </span>
</a>
<a id="pet-battles" data-tooltip="Pet Battles"
class="film-strip-thumb-wrapper thumbnail-loader scroll-content-item"
data-item-key="pet-battles"
data-item-index="15"
data-gallery-type="videos"
href="?view=pet-battles"
itemProf="isPartOf">
<span class="film-strip-thumb-frame" data-thumbsrc="http://media.blizzard.com/wow/media/videos/pet-battles/pet-battles-small.jpg"> </span>
</a>
<a id="mists-cinematic" data-tooltip="Mists of Pandaria Cinematic"
class="film-strip-thumb-wrapper thumbnail-loader scroll-content-item"
data-item-key="mists-cinematic"
data-item-index="16"
data-gallery-type="videos"
href="?view=mists-cinematic"
itemProf="isPartOf">
<span class="film-strip-thumb-frame" data-thumbsrc="http://media.blizzard.com/wow/media/videos/mists-cinematic/mists-cinematic-small.jpg"> </span>
</a>
<a id="patch-5-0" data-tooltip="Patch 5.0.4 Features"
class="film-strip-thumb-wrapper thumbnail-loader scroll-content-item"
data-item-key="patch-5-0"
data-item-index="17"
data-gallery-type="videos"
href="?view=patch-5-0"
itemProf="isPartOf">
<span class="film-strip-thumb-frame" data-thumbsrc="http://media.blizzard.com/wow/media/videos/patch-5-0/patch-5-0-small.jpg"> </span>
</a>
<a id="battle-net-sms-protect" data-tooltip="Battle.net SMS Protect"
class="film-strip-thumb-wrapper thumbnail-loader scroll-content-item"
data-item-key="battle-net-sms-protect"
data-item-index="18"
data-gallery-type="videos"
href="?view=battle-net-sms-protect"
itemProf="isPartOf">
<span class="film-strip-thumb-frame" data-thumbsrc="http://media.blizzard.com/wow/media/videos/battle-net-sms-protect/battle-net-sms-protect-small.jpg"> </span>
</a>
<a id="battle-net-balance" data-tooltip="Battle.net Balance"
class="film-strip-thumb-wrapper thumbnail-loader scroll-content-item"
data-item-key="battle-net-balance"
data-item-index="19"
data-gallery-type="videos"
href="?view=battle-net-balance"
itemProf="isPartOf">
<span class="film-strip-thumb-frame" data-thumbsrc="http://media.blizzard.com/wow/media/videos/battle-net-balance/battle-net-balance-small.jpg"> </span>
</a>
<a id="item-restoration" data-tooltip="Item Restoration"
class="film-strip-thumb-wrapper thumbnail-loader scroll-content-item"
data-item-key="item-restoration"
data-item-index="20"
data-gallery-type="videos"
href="?view=item-restoration"
itemProf="isPartOf">
<span class="film-strip-thumb-frame" data-thumbsrc="http://media.blizzard.com/wow/media/videos/item-restoration/item-restoration-small.jpg"> </span>
</a>
<a id="recruit-a-friend" data-tooltip="Recruit-A-Friend"
class="film-strip-thumb-wrapper thumbnail-loader scroll-content-item"
data-item-key="recruit-a-friend"
data-item-index="21"
data-gallery-type="videos"
href="?view=recruit-a-friend"
itemProf="isPartOf">
<span class="film-strip-thumb-frame" data-thumbsrc="http://media.blizzard.com/wow/media/videos/recruit-a-friend/recruit-a-friend-small.jpg"> </span>
</a>
<a id="help-i-got-hacked" data-tooltip="Help I got Hacked"
class="film-strip-thumb-wrapper thumbnail-loader scroll-content-item"
data-item-key="help-i-got-hacked"
data-item-index="22"
data-gallery-type="videos"
href="?view=help-i-got-hacked"
itemProf="isPartOf">
<span class="film-strip-thumb-frame" data-thumbsrc="http://media.blizzard.com/wow/media/videos/help-i-got-hacked/help-i-got-hacked-small.jpg"> </span>
</a>
<a id="hour-of-twilight" data-tooltip="Hour of Twilight"
class="film-strip-thumb-wrapper thumbnail-loader scroll-content-item"
data-item-key="hour-of-twilight"
data-item-index="23"
data-gallery-type="videos"
href="?view=hour-of-twilight"
itemProf="isPartOf">
<span class="film-strip-thumb-frame" data-thumbsrc="http://media.blizzard.com/wow/media/videos/hour-of-twilight/hour-of-twilight-small.jpg"> </span>
</a>
<a id="mists-of-pandaria-reveal" data-tooltip="Mists of Pandaria Reveal"
class="film-strip-thumb-wrapper thumbnail-loader scroll-content-item"
data-item-key="mists-of-pandaria-reveal"
data-item-index="24"
data-gallery-type="videos"
href="?view=mists-of-pandaria-reveal"
itemProf="isPartOf">
<span class="film-strip-thumb-frame" data-thumbsrc="http://media.blizzard.com/wow/media/videos/mists-reveal/mists-of-pandaria-reveal-small.jpg"> </span>
</a>
<a id="rage-of-the-firelands" data-tooltip="Rage of the Firelands"
class="film-strip-thumb-wrapper thumbnail-loader scroll-content-item"
data-item-key="rage-of-the-firelands"
data-item-index="25"
data-gallery-type="videos"
href="?view=rage-of-the-firelands"
itemProf="isPartOf">
<span class="film-strip-thumb-frame" data-thumbsrc="http://media.blizzard.com/wow/media/videos/rage-of-the-firelands/rage-of-the-firelands-small.jpg"> </span>
</a>
<a id="zandalari" data-tooltip="Rise of the Zandalari"
class="film-strip-thumb-wrapper thumbnail-loader scroll-content-item"
data-item-key="zandalari"
data-item-index="26"
data-gallery-type="videos"
href="?view=zandalari"
itemProf="isPartOf">
<span class="film-strip-thumb-frame" data-thumbsrc="http://media.blizzard.com/wow/media/videos/zandalari/zandalari-small.jpg"> </span>
</a>
<a id="cataclysm-intro" data-tooltip="Cataclysm Cinematic"
class="film-strip-thumb-wrapper thumbnail-loader scroll-content-item"
data-item-key="cataclysm-intro"
data-item-index="27"
data-gallery-type="videos"
href="?view=cataclysm-intro"
itemProf="isPartOf">
<span class="film-strip-thumb-frame" data-thumbsrc="http://media.blizzard.com/wow/media/videos/cataclysm-intro/cataclysm-intro-small.jpg"> </span>
</a>
<a id="cataclysm-tv-spot" data-tooltip="Cataclysm TV Spot"
class="film-strip-thumb-wrapper thumbnail-loader scroll-content-item"
data-item-key="cataclysm-tv-spot"
data-item-index="28"
data-gallery-type="videos"
href="?view=cataclysm-tv-spot"
itemProf="isPartOf">
<span class="film-strip-thumb-frame" data-thumbsrc="http://media.blizzard.com/wow/media/videos/cataclysm-tv-spot/cataclysm-tv-spot-small.jpg"> </span>
</a>
<a id="cataclysm-worldreborn" data-tooltip="Cataclysm - The World Reborn"
class="film-strip-thumb-wrapper thumbnail-loader scroll-content-item"
data-item-key="cataclysm-worldreborn"
data-item-index="29"
data-gallery-type="videos"
href="?view=cataclysm-worldreborn"
itemProf="isPartOf">
<span class="film-strip-thumb-frame" data-thumbsrc="http://media.blizzard.com/wow/media/videos/cataclysm-worldreborn/cataclysm-worldreborn-small.jpg"> </span>
</a>
<a id="cataclysm-reveal" data-tooltip="Cataclysm Reveal"
class="film-strip-thumb-wrapper thumbnail-loader scroll-content-item"
data-item-key="cataclysm-reveal"
data-item-index="30"
data-gallery-type="videos"
href="?view=cataclysm-reveal"
itemProf="isPartOf">
<span class="film-strip-thumb-frame" data-thumbsrc="http://media.blizzard.com/wow/media/videos/cataclysm-reveal/cataclysm-reveal-small.jpg"> </span>
</a>
<a id="wrath-ending" data-tooltip="Wrath of the Lich King Ending"
class="film-strip-thumb-wrapper thumbnail-loader scroll-content-item"
data-item-key="wrath-ending"
data-item-index="31"
data-gallery-type="videos"
href="?view=wrath-ending"
itemProf="isPartOf">
<span class="film-strip-thumb-frame" data-thumbsrc="http://media.blizzard.com/wow/media/videos/wrath-ending/wrath-ending-small.jpg"> </span>
</a>
<a id="fall-of-the-lich-king" data-tooltip="Fall of the Lich King"
class="film-strip-thumb-wrapper thumbnail-loader scroll-content-item"
data-item-key="fall-of-the-lich-king"
data-item-index="32"
data-gallery-type="videos"
href="?view=fall-of-the-lich-king"
itemProf="isPartOf">
<span class="film-strip-thumb-frame" data-thumbsrc="http://media.blizzard.com/wow/media/videos/fall-of-the-lich-king/fall-of-the-lich-king-small.jpg"> </span>
</a>
<a id="call-of-the-crusade" data-tooltip="Call of the Crusade"
class="film-strip-thumb-wrapper thumbnail-loader scroll-content-item"
data-item-key="call-of-the-crusade"
data-item-index="33"
data-gallery-type="videos"
href="?view=call-of-the-crusade"
itemProf="isPartOf">
<span class="film-strip-thumb-frame" data-thumbsrc="http://media.blizzard.com/wow/media/videos/call-of-the-crusade/call-of-the-crusade-small.jpg"> </span>
</a>
<a id="ulduar" data-tooltip="Secrets of Ulduar"
class="film-strip-thumb-wrapper thumbnail-loader scroll-content-item"
data-item-key="ulduar"
data-item-index="34"
data-gallery-type="videos"
href="?view=ulduar"
itemProf="isPartOf">
<span class="film-strip-thumb-frame" data-thumbsrc="http://media.blizzard.com/wow/media/videos/ulduar/ulduar-small.jpg"> </span>
</a>
<a id="wrathgate" data-tooltip="The Wrathgate"
class="film-strip-thumb-wrapper thumbnail-loader scroll-content-item"
data-item-key="wrathgate"
data-item-index="35"
data-gallery-type="videos"
href="?view=wrathgate"
itemProf="isPartOf">
<span class="film-strip-thumb-frame" data-thumbsrc="http://media.blizzard.com/wow/media/videos/wrathgate/wrathgate-small.jpg"> </span>
</a>
<a id="wrath-cinematic" data-tooltip="Wrath of the Lich King Cinematic"
class="film-strip-thumb-wrapper thumbnail-loader scroll-content-item"
data-item-key="wrath-cinematic"
data-item-index="36"
data-gallery-type="videos"
href="?view=wrath-cinematic"
itemProf="isPartOf">
<span class="film-strip-thumb-frame" data-thumbsrc="http://media.blizzard.com/wow/media/videos/wrath-cinematic/wrath-cinematic-small.jpg"> </span>
</a>
<a id="wrath-reveal" data-tooltip="Wrath of the Lich King Reveal"
class="film-strip-thumb-wrapper thumbnail-loader scroll-content-item"
data-item-key="wrath-reveal"
data-item-index="37"
data-gallery-type="videos"
href="?view=wrath-reveal"
itemProf="isPartOf">
<span class="film-strip-thumb-frame" data-thumbsrc="http://media.blizzard.com/wow/media/videos/wrath-reveal/wrath-reveal-small.jpg"> </span>
</a>
<a id="sunwell" data-tooltip="Fury of the Sunwell"
class="film-strip-thumb-wrapper thumbnail-loader scroll-content-item"
data-item-key="sunwell"
data-item-index="38"
data-gallery-type="videos"
href="?view=sunwell"
itemProf="isPartOf">
<span class="film-strip-thumb-frame" data-thumbsrc="http://media.blizzard.com/wow/media/videos/sunwell/sunwell-small.jpg"> </span>
</a>
<a id="zulaman" data-tooltip="The Gods of Zul’Aman"
class="film-strip-thumb-wrapper thumbnail-loader scroll-content-item"
data-item-key="zulaman"
data-item-index="39"
data-gallery-type="videos"
href="?view=zulaman"
itemProf="isPartOf">
<span class="film-strip-thumb-frame" data-thumbsrc="http://media.blizzard.com/wow/media/videos/zulaman/zulaman-small.jpg"> </span>
</a>
<a id="black-temple" data-tooltip="The Black Temple"
class="film-strip-thumb-wrapper thumbnail-loader scroll-content-item"
data-item-key="black-temple"
data-item-index="40"
data-gallery-type="videos"
href="?view=black-temple"
itemProf="isPartOf">
<span class="film-strip-thumb-frame" data-thumbsrc="http://media.blizzard.com/wow/media/videos/black-temple/black-temple-small.jpg"> </span>
</a>
<a id="lament-of-the-highborne" data-tooltip="Lament of the Highborne"
class="film-strip-thumb-wrapper thumbnail-loader scroll-content-item"
data-item-key="lament-of-the-highborne"
data-item-index="41"
data-gallery-type="videos"
href="?view=lament-of-the-highborne"
itemProf="isPartOf">
<span class="film-strip-thumb-frame" data-thumbsrc="http://media.blizzard.com/wow/media/videos/lament-of-the-highborne/lament-of-the-highborne-small.jpg"> </span>
</a>
<a id="burning-crusade-cinematic" data-tooltip="The Burning Crusade Cinematic"
class="film-strip-thumb-wrapper thumbnail-loader scroll-content-item"
data-item-key="burning-crusade-cinematic"
data-item-index="42"
data-gallery-type="videos"
href="?view=burning-crusade-cinematic"
itemProf="isPartOf">
<span class="film-strip-thumb-frame" data-thumbsrc="http://media.blizzard.com/wow/media/videos/burning-crusade-cinematic/burning-crusade-cinematic-small.jpg"> </span>
</a>
<a id="naxxramas" data-tooltip="Shadow of the Necropolis"
class="film-strip-thumb-wrapper thumbnail-loader scroll-content-item"
data-item-key="naxxramas"
data-item-index="43"
data-gallery-type="videos"
href="?view=naxxramas"
itemProf="isPartOf">
<span class="film-strip-thumb-frame" data-thumbsrc="http://media.blizzard.com/wow/media/videos/naxxramas/naxxramas-small.jpg"> </span>
</a>
<a id="ahn-qiraj" data-tooltip="The Gates of Ahn'Qiraj"
class="film-strip-thumb-wrapper thumbnail-loader scroll-content-item"
data-item-key="ahn-qiraj"
data-item-index="44"
data-gallery-type="videos"
href="?view=ahn-qiraj"
itemProf="isPartOf">
<span class="film-strip-thumb-frame" data-thumbsrc="http://media.blizzard.com/wow/media/videos/ahn-qiraj/ahn-qiraj-small.jpg"> </span>
</a>
<a id="blackwing-lair" data-tooltip="Assault on Blackwing Lair"
class="film-strip-thumb-wrapper thumbnail-loader scroll-content-item"
data-item-key="blackwing-lair"
data-item-index="45"
data-gallery-type="videos"
href="?view=blackwing-lair"
itemProf="isPartOf">
<span class="film-strip-thumb-frame" data-thumbsrc="http://media.blizzard.com/wow/media/videos/blackwing-lair/blackwing-lair-small.jpg"> </span>
</a>
<a id="wow-cinematic" data-tooltip="World of Warcraft Cinematic"
class="film-strip-thumb-wrapper thumbnail-loader scroll-content-item"
data-item-key="wow-cinematic"
data-item-index="46"
data-gallery-type="videos"
href="?view=wow-cinematic"
itemProf="isPartOf">
<span class="film-strip-thumb-frame" data-thumbsrc="http://media.blizzard.com/wow/media/videos/wow-cinematic/wow-cinematic-small.jpg"> </span>
</a>
<a id="war3x" data-tooltip="Warcraft III: The Frozen Throne"
class="film-strip-thumb-wrapper thumbnail-loader scroll-content-item"
data-item-key="war3x"
data-item-index="47"
data-gallery-type="videos"
href="?view=war3x"
itemProf="isPartOf">
<span class="film-strip-thumb-frame" data-thumbsrc="http://media.blizzard.com/wow/media/videos/war3x/war3x-small.jpg"> </span>
</a>
<a id="war3" data-tooltip="Warcraft III: Reign of Chaos"
class="film-strip-thumb-wrapper thumbnail-loader scroll-content-item"
data-item-key="war3"
data-item-index="48"
data-gallery-type="videos"
href="?view=war3"
itemProf="isPartOf">
<span class="film-strip-thumb-frame" data-thumbsrc="http://media.blizzard.com/wow/media/videos/war3/war3-small.jpg"> </span>
</a>
<a id="war2x" data-tooltip="Warcraft II: Beyond the Dark Portal"
class="film-strip-thumb-wrapper thumbnail-loader scroll-content-item"
data-item-key="war2x"
data-item-index="49"
data-gallery-type="videos"
href="?view=war2x"
itemProf="isPartOf">
<span class="film-strip-thumb-frame" data-thumbsrc="http://media.blizzard.com/wow/media/videos/war2x/war2x-small.jpg"> </span>
</a>
<a id="war2" data-tooltip="Warcraft II: Tides of Darkness"
class="film-strip-thumb-wrapper thumbnail-loader scroll-content-item"
data-item-key="war2"
data-item-index="50"
data-gallery-type="videos"
href="?view=war2"
itemProf="isPartOf">
<span class="film-strip-thumb-frame" data-thumbsrc="http://media.blizzard.com/wow/media/videos/war2/war2-small.jpg"> </span>
</a>
<a id="war1" data-tooltip="WarCraft: Orcs and Humans"
class="film-strip-thumb-wrapper thumbnail-loader scroll-content-item"
data-item-key="war1"
data-item-index="51"
data-gallery-type="videos"
href="?view=war1" style="margin-bottom:0"
itemProf="isPartOf">
<span class="film-strip-thumb-frame" data-thumbsrc="http://media.blizzard.com/wow/media/videos/war1/war1-small.jpg"> </span>
</a>
</div>
</div>
</div>
<div class="ajax-frame">
<table>
<tr>
<td id="film-strip-ajax-target">
<meta itemprop="contentUrl" content="http://media.blizzard.com/wow/media/videos/warlords-of-draenor-wish-you-were-here-en_GB" />
<meta itemprop="thumbnail" content="http://media.blizzard.com/wow/media/videos/warlords-of-draenor-wish-you-were-here/warlords-of-draenor-wish-you-were-here-index-thumb.jpg" />
<div id="flash-container">
<div id="flash-video"></div>
</div>
</td>
</tr>
</table>
<a href="?view=warlords-of-draenor-character-boost" class="paging-arrow next"></a>
<a href="?view=war1" class="paging-arrow previous"></a>
</div>
</div>
<div id="media-meta-data">
<div class="meta-data">
<div id="item-title" itemprop="name">Warlords of Draenor Trailer: Wish You Were Here </div>
<dl class="meta-details">
<dt>Date Added: </dt>
<dd>10/03/2014</dd>
<dt class="dt-separator">Keyword:</dt>
<dd>
<a href="?view=warlords-of-draenor-wish-you-were-here&amp;keywords=trailer">General</a>
</dd>
</dl>
<span class="clear"><!-- --></span>
</div>
</div>
</div>
<div id="comments" class="bnet-comments ">
<h2 class="subheader-2" >Loading Comments…</h2>
<h2 class="hide" >An error has occurred loading comments.</h2>
<div class="comments-loading"></div>
</div>
<script type="text/javascript">
//<![CDATA[
$(function() {
if (window.history.pushState) {
window.history.replaceState({ itemKey: "warlords-of-draenor-wish-you-were-here" }, "warlords-of-draenor-wish-you-were-here", "?view=warlords-of-draenor-wish-you-were-here");
}
GalleryViewer.factory(".film-strip-wrapper", {
dataKey: "videos",
currentItemKey: "warlords-of-draenor-wish-you-were-here",
indices: indices,
itemPaths: itemPaths,
galleryType: "videos",
discussionKeys: discussionKeys,
discussionSigs: discussionSigs,
suppressAjaxLoad: true,
hasKeywords: true,
filmStripView: true,
keywords: "",
videoData: videoData
});
});
//]]>
</script> </div>
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