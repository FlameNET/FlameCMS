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
<h1>Users <span>registered</span></h1>
<div class="innerLR">
<!-- Widget -->
<div class="widget widget-heading-simple widget-body-gray widget-employees">		
<!-- Widget Heading -->
<div class="widget-head">
<h4 class="heading glyphicons user"><i></i>Manage Users</h4>
</div>
<!-- // Widget Heading END -->	
<div class="widget-body padding-none">	
<div class="row-fluid row-merge">
<div class="span4 listWrapper">
<div class="innerAll">
<form autocomplete="off" class="form-inline">
<div class="widget-search separator bottom">
<button type="button" class="btn btn-default pull-right"><i class="icon-search"></i></button>
<div class="overflow-hidden">
<input type="text" value="" placeholder="Find someone ..">
</div>
</div>
<select style="width: 100%;">
<optgroup label="Ranks">
<option value="members">Members</option>
<option value="mvp">MvP</option>
<option value="donators">Donators</option>
</optgroup>
</select>
</form>
</div>
<a href="#"><span class="results">Showing 20 of 1490 Users Found <i class="icon-circle-arrow-down"></i> [Load more]</span></a>
<ul class="list unstyled">
<li class="active">
<div class="media innerAll">
<div class="media-object pull-left thumb hidden-phone"><img data-src="holder.js/51x51/dark" alt="Image" /></div>
<div class="media-body">
<span class="strong">Alex Papadopoulos</span>
<span class="muted">alex_pap_2010@live.com</span>
<i class="icon-envelope"></i>
<i class="icon-phone"></i> 
<i class="icon-skype"></i> 
</div>
</div>
</li>
<li>
<div class="media innerAll">
<div class="media-object pull-left thumb hidden-phone"><img data-src="holder.js/51x51/dark" alt="Image" /></div>
<div class="media-body">
<span class="strong">Alex Papadopoulos</span>
<span class="muted">alex_pap_2010@live.com</span>
<i class="icon-envelope"></i>
<i class="icon-phone"></i> 
<i class="icon-skype"></i> 
</div>
</div>
</li>
<li>
<div class="media innerAll">
<div class="media-object pull-left thumb hidden-phone"><img data-src="holder.js/51x51/dark" alt="Image" /></div>
<div class="media-body">
<span class="strong">One Piece FTW</span>
<span class="muted">onepiece@OP.com</span>
<i class="icon-envelope"></i>
<i class="icon-phone"></i> 
<i class="icon-skype"></i> 
</div>
</div>
</li>
<li>
<div class="media innerAll">
<div class="media-object pull-left thumb hidden-phone"><img data-src="holder.js/51x51/dark" alt="Image" /></div>
<div class="media-body">
<span class="strong">Horizon End</span>
<span class="muted">horizonnearend@end.com</span>
<i class="icon-envelope"></i>
<i class="icon-phone"></i> 
<i class="icon-skype"></i> 
</div>
</div>
</li>				
</ul>
</div>
<div class="span8 detailsWrapper">
<div class="ajax-loading hide">
<i class="icon-spinner icon-spin icon-4x"></i>
</div>
<div class="innerAll">
<div class="title">
<div class="row-fluid">
<div class="span8">
<h3 class="text-primary">Adrian Demian</h3>
<span class="muted">[MvP] Member</span>
</div>
<div class="span4 text-right">
<p class="muted">2 votes <a href=""><i class="icon-circle-arrow-right"></i></a></p>
<div class="margin-bottom-none progress progress-small count-outside"><div class="count">15%</div><div class="bar" style="width: 15%;"></div></div>
</div>
</div>
</div>
<hr/>
<div class="body">
<div class="row-fluid">
<div class="span4 overflow-hidden">
<!-- Profile Photo -->
<div class="center"><a href="" class="thumb inline-block"><img data-src="holder.js/300x200" alt="Profile" /></a></div>
<div class="separator bottom"></div>
<!-- // Profile Photo END -->
<ul class="icons-ul">
<li><i class="icon-envelope icon-li icon-fixed-width"></i> adriandemian@google.com</li>
<li><i class="icon-skype icon-li icon-fixed-width"></i> demian.pro</li>
<li><i class="icon-gift icon-li icon-fixed-width"></i> 2 Donations</li>
</ul>
</div>
<div class="span8">
<h5 class="strong">About</h5>
<p>Got nothing to view here, move on!</p>
<div class="row-fluid">
<div class="span4">
<h5 class="strong">Votes</h5>
<a href="" class="btn btn-primary btn-small btn-block"><i class="icon-download-alt icon-fixed-width"></i> June</a>
<a href="" class="btn btn-default btn-small btn-block"><i class="icon-download-alt icon-fixed-width"></i> May</a>
<a href="" class="btn btn-default btn-small btn-block"><i class="icon-download-alt icon-fixed-width"></i> April</a>
<div class="separator bottom"></div>
</div>
<div class="span7 offset1">
<h5 class="strong">Website Achievements</h5>
<div class="progress progress-mini progress-primary count-outside add-outside"><div class="count">100%</div><div class="bar" style="width: 100%;"></div><div class="add">MVP</div></div>
<div class="progress progress-mini progress-primary count-outside add-outside"><div class="count">90%</div><div class="bar" style="width: 90%;"></div><div class="add">General</div></div>
<div class="progress progress-mini progress-primary count-outside add-outside"><div class="count">93%</div><div class="bar" style="width: 93%;"></div><div class="add">Explore</div></div>
<div class="progress progress-mini progress-primary count-outside add-outside"><div class="count">79%</div><div class="bar" style="width: 79%;"></div><div class="add">User</div></div>
<div class="progress progress-mini count-outside add-outside"><div class="count">20%</div><div class="bar" style="width: 20%;"></div><div class="add">Support</div></div>
<div class="separator bottom"></div>
</div>
</div>
<h5 class="text-uppercase strong text-primary"><i class="icon-group text-regular icon-fixed-width"></i>Aliases
 <span class="text-lowercase padding-none">(4 aliases)</span></h5>
<ul class="team">
<li><span class="crt">1</span><span class="strong">FailZorD</span><span class="muted">God 90 Level</span></li>
<li><span class="crt">2</span><span class="strong">JesusPRO</span><span class="muted">Priest 90 Level</span></li>
<li><span class="crt">3</span><span class="strong">Kit4Fun</span><span class="muted">Druid 90 Level</span></li>
<li><span class="crt">4</span><span class="strong">Yourmommy</span><span class="muted">DK 90 Level</span></li>
</ul>
</div>
</div>
</div>
</div>
</div>
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