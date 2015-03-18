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
<h1>Main Page / Dashboard</h1>
<!-- Stats Widgets -->
<div class="row-fluid row-merge border-top">
<div class="span3">
<div class="innerAll padding-bottom-none-phone">
<a href="update.php" class="widget-stats widget-stats-default widget-stats-4">
<span class="txt">Updates</span>
<span class="count">0</span>
<span class="glyphicons warning_sign"><i></i></span>
<div class="clearfix"></div>
<i class="icon-play-circle"></i>
</a>
</div>
</div>
<div class="span3">
<div class="innerAll padding-bottom-none-phone">
<a href="progress.php" class="widget-stats widget-stats-primary widget-stats-4">
<span class="txt">Progress</span>
<span class="count">01%</span>
<span class="glyphicons refresh"><i></i></span>
<div class="clearfix"></div>
<i class="icon-play-circle"></i>
</a>
</div>
</div>
<div class="span3">
<div class="innerAll padding-bottom-none-phone">
<a href="" class="widget-stats widget-stats-gray widget-stats-4">
<span class="txt">Signups</span>
<span class="count">0<span>Today</span></span>
<span class="glyphicons user"><i></i></span>
<div class="clearfix"></div>
<i class="icon-play-circle"></i>
</a>
</div>
</div>
<div class="span3">
<div class="innerAll padding-bottom-none-phone">
<a href="" class="widget-stats widget-stats-2">
<span class="count">0</span>
<span class="txt">Total Users</span>
</a>
</div>
</div>
</div>
<!-- ADD HERE --><div class="heading-buttons">
<h2 class="heading pull-left"><i class="icon-bar-chart icon-fixed-width text-primary"></i> Website Traffic</h2>
<div class="buttons">
<a href="google_analytics.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-default-menus-dark&amp;sidebar_type=collapsible" class="btn btn-primary">Google Analytics API</a>
</div>
<div class="clearfix"></div>
</div>
<div class="innerLR innerT">
<!-- Website Traffic Chart -->
<div class="widget widget-body-gray">
<div class="widget-body">
<div id="chart_simple" style="height: 253px;"></div>
</div>
</div>
<!-- // Website Traffic Chart END -->
</div>
</div>
<!-- // Content END -->
</div>
<div class="clearfix"></div>
<!-- // Sidebar menu & content wrapper END -->	
<?php include('webkit/version.php');?>
<!-- // Footer END -->
</div>
<!-- // Main Container Fluid END -->
<!-- Themer -->
<?php include('webkit/themer');?>
<!-- // Themer END -->
<?php include('webkit/jquery');?>
</body>
</html>