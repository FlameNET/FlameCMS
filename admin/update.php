<?php require_once('../system/config.php');
$account->AccountLoginQuery();
$account->AccountLoginCheck();
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7 fluid top-full menuh-top sticky-top sidebar sidebar-full sidebar-collapsible sidebar-width-mini sticky-sidebar sidebar-hat"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8 fluid top-full menuh-top sticky-top sidebar sidebar-full sidebar-collapsible sidebar-width-mini sticky-sidebar sidebar-hat"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9 fluid top-full menuh-top sticky-top sidebar sidebar-full sidebar-collapsible sidebar-width-mini sticky-sidebar sidebar-hat"> <![endif]-->
<!--[if gt IE 8]> <html class="animations ie gt-ie8 fluid top-full menuh-top sticky-top sidebar sidebar-full sidebar-collapsible sidebar-width-mini sticky-sidebar sidebar-hat"> <![endif]-->
<!--[if !IE]><!--><html class="animations fluid top-full menuh-top sticky-top sidebar sidebar-full sidebar-collapsible sidebar-width-mini sticky-sidebar sidebar-hat"><!-- <![endif]-->
<head>
<?php include('webkit/head');?>
</head>
<body class="document-body ">
<!-- Main Container Fluid -->
<?php include('webkit/sidebar');?>	
<!-- Content -->
<div id="content">
<!-- Top navbar -->
<?php include('webkit/navbar');?>
<!-- Top navbar END -->
<div class="innerLR innerT">
<div class="widget-search form-inline">
<button type="button" class="btn btn-primary pull-right">Search <i class="icon-search"></i></button>
<div class="overflow-hidden">
<input type="text" value="" placeholder="Type your keywords ..">
</div>
</div>
</div>
<div class="row-fluid row-merge border-top">
<div class="widget widget-heading-simple widget-body-gray">
<div class="widget-body padding-none">
<div class="hero-unit margin-none center">
<h1 class="separator bottom">Update Manager</h1>
<p>Update Manager is an automated function that let's you know when you have an update to install! All you need to do is simply press a button that will redirect you to the perfect link with the correct update! If you do not want to update via viewing the updates you can simply download our ZIP-ed edition. Most updates will improve the functionality of the website and also may fix BUGS. Thou we can not work without being helped by the Community and the members that use our website. So please consider reporting problems that you find!</p>
</div>
</div>
</div>
<p class="separator text-center"><i class="icon-collapse icon-3x"></i></p><br>
<?php 
//init
//put this function where it belongs plz
function get_content_from_github($url) {
	//returns an array with all the content that the function will get
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1); 
	curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,1);
	$content = curl_exec($ch);
	curl_close($ch);
	return json_decode($content,true);
}
//function to check if it's updated or not
function check_updates($content_github=array()/*array*/,$current_version='')
{
	if(count($content_github) == 0)
	{
		return 'e1';//error 1 -> no pointers on the array
	}
	else
	{
		if(($content_github['tag_name']==$current_version) && ($content_github['target_commitish']=='3.3.5'))
		{
			return '0';//no updates
		}
		elseif(($content_github['tag_name']!=$current_version) && ($content_github['target_commitish']=='3.3.5'))
		{
			return '1';//update
		}
		elseif(($content_github['tag_name']!=$current_version) && ($content_github['target_commitish']!='3.3.5'))
		{
			return 'e2';//can't find updates for this repo
		}
	}
}
//url to get the lastest version (still dont know how to separate the branches)
$url='https://api.github.com/repos/FlameNET/FlameCMS/releases/latest';
//call function get_content_from_github($url)
$content_github=get_content_from_github($url);
$updated=check_updates($content_github,'1.1');
if($updated=='1')
{
	$update_link='https://github.com/FlameNET/FlameCMS/archive/v'.$content_github['tag_name'].'.zip';
}
else
{
	//not counting with errors (e1 && e2)
	//no updates
}
?>
<p class="separator text-center"><i class="icon-collapse icon-3x"></i></p><br>
<div class="widget-body">
<div class="span2">
<!-- Stats Widget -->
<a href="" class="widget-stats widget-stats-1">
<span class="glyphicons shield"><i></i><span class="txt">Commits</span></span>
<div class="clearfix"></div>
<span class="count">12</span>
</a>
<!-- // Stats Widget END -->
</div>
<div class="span2">	
<!-- Stats Widget -->
<a href="" class="widget-stats widget-stats-gray widget-stats-2">
<span class="count">376</span>
<span class="txt">Line Updates</span>
	</a>
<!-- // Stats Widget END -->
</div>
<div class="span2">
<!-- Stats Widget -->
<a href="" class="widget-stats widget-stats-gray widget-stats-2 widget-stats-easy-pie txt-single">
<div data-percent="20" class="easy-pie inverse"><span class="value">20</span>%</div>
<span class="txt">Design</span>
<div class="clearfix"></div>
</a>
<!-- // Stats Widget END -->
</div>
<div class="span2">
<!-- Stats Widget -->
<a href="" class="widget-stats widget-stats-2 widget-stats-easy-pie txt-single">
<div data-percent="12" class="easy-pie primary"><span class="value">12</span>%</div>
<span class="txt">Code</span>
<div class="clearfix"></div>
</a>
<!-- // Stats Widget END -->
</div>
<div class="span2">
<!-- Stats Widget -->
<a href="" class="widget-stats widget-stats-2">
<span class="count">4</span>
<span class="txt">Members</span>
</a>
<!-- // Stats Widget END -->
</div>
<div class="span2">
<!-- Stats Widget -->
<a href="" class="widget-stats widget-stats-gray widget-stats-1">
<span class="glyphicons cart_in"><i></i><span class="txt">Downloads</span></span>
<div class="clearfix"></div>
<span class="count">2</span>
</a>
<!-- // Stats Widget END -->
</div>
</div>
<div class="clearfix"></div>
<p class="separator text-center"><i class="icon-ellipsis-horizontal icon-3x"></i></p><br>
<div class="row-fluid">
<div class="span4">
<div class="widget widget-heading-simple widget-body-white">
<div class="widget-head"><h4 class="label label-success" class="heading strong text-uppercase">Update Commits</h4></div>
<ul class="icons-ul">
    <li><span class="icon-li icon-remove"></span> [21] Small Fixes? Maybe...</li>
    <li><span class="icon-li icon-remove"></span> [20] Update year?! Duh!...</li>
    <li><span class="icon-li icon-remove"></span> [19] Rewrite Super Language... </li>
    <li><span class="icon-li icon-remove"></span> [18] Admin Panel V0.0.3 + less... </li>
    <li><span class="icon-li icon-remove"></span> [17] Registration added... </li>
    <li><span class="icon-li icon-remove"></span> [16] Big Fixes... </li>
    <li><span class="icon-li icon-remove"></span> [15] Login Feature 100% Functional... </li>
</ul>
</div>
</div>
<div class="span4">
<div class="widget widget-heading-simple widget-body-white">
<div class="widget-head"><h4 class="label label-info" class="heading strong text-uppercase">Pack Commits</h4></div>
<ul class="icons-ul">
    <li><span class="icon-li icon-remove"></span> [14] Update featuresnews and articles...</li>
    <li><span class="icon-li icon-remove"></span> [13] Rewrite ReadME + Files...</li>
    <li><span class="icon-li icon-remove"></span> [12] Oops! .SQL?!... </li>
    <li><span class="icon-li icon-remove"></span> [11] More PHP + 1Page @admin </li>
    <li><span class="icon-li icon-remove"></span> [10] Admin Panel V0.0.1 + more... </li>
    <li><span class="icon-li icon-remove"></span> [9] Small Fixes... </li>
    <li><span class="icon-li icon-remove"></span> [8] Install Feature + Style. </li>
</ul>
</div>
</div>
<div class="span4">
<div class="widget widget-heading-simple widget-body-white">
<div class="widget-head"><h4 class="label" class="heading strong text-uppercase">More Commits</h4></div>
<ul class="icons-ul">
    <li><span class="icon-li icon-remove"></span> [7] Update featuresnews and articles...</li>
    <li><span class="icon-li icon-remove"></span> [6] Rewrite ReadME + Files...</li>
    <li><span class="icon-li icon-remove"></span> [5] Oops! .SQL?!... </li>
    <li><span class="icon-li icon-remove"></span> [4] More PHP + 1Page @admin </li>
    <li><span class="icon-li icon-remove"></span> [3] Admin Panel V0.0.1 + more... </li>
    <li><span class="icon-li icon-remove"></span> [2] Small Fixes... </li>
    <li><span class="icon-li icon-remove"></span> [1] Install Feature + Style. </li>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- // Content END -->
<div class="clearfix"></div>
<!-- // Sidebar menu & content wrapper END -->	
<?php include('webkit/version.php');?>
<!-- // Footer END -->
</div>
<!-- // Main Container Fluid END -->
<!-- Themer -->
<?php include('webkit/themer');?>
<!-- // Themer END -->
<?php include('webkit/jquery_prog');?>
</body>
</html>
