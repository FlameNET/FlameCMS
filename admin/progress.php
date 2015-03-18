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
<h1>Progress <span> Versions</span></h1>
<div class="innerLR">
<div class="row-fluid">
<?php include('webkit/pan1')?>

	</div>
<!-- Later add with Github API -->
	<div class="widget">
		<div class="widget-body">
			<table class="table table-white table-vertical-center margin-none table-striped">
				<thead>
					<tr>
						<th class="center">Commiter</th>
						<th class="center">Title</th>
						<th class="center">Location</th>
						<th class="center">Completion</th>
						<th class="center">Package Size</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="center"><img data-src="holder.js/50x50/dark" alt="Image" /></td>
						<td class="strong center">Lorem Ipsum Dolor</td>
						<td class="center">Romania <a href="" class="innerL text-underline">view on map <i class="icon-map-marker"></i></a></td>
						<td class="center">
							<div class="rating text-large text-faded read-only">
					        	<span class="star active"></span>
					        	<span class="star"></span>
					        	<span class="star"></span>
					        	<span class="star"></span>
					        	<span class="star"></span>
					        </div>
						</td>
						<td class="center"><span class="strong text-large">5 <i class="icon-gift"></i></span></td>
					</tr>
					<tr>
						<td class="center"><img data-src="holder.js/50x50/dark" alt="Image" /></td>
						<td class="strong center">John Doe</td>
						<td class="center">United States <a href="" class="innerL text-underline">view on map <i class="icon-map-marker"></i></a></td>
						<td class="center">
							<div class="rating text-large read-only">
					        	<span class="star"></span>
					        	<span class="star"></span>
					        	<span class="star active"></span>
					        	<span class="star"></span>
					        	<span class="star"></span>
					        </div>
						</td>
						<td class="center"><span class="strong text-large">4 <i class="icon-gift"></i></span></td>
					</tr>
					<tr>
						<td class="center"><img data-src="holder.js/50x50/dark" alt="Image" /></td>
						<td class="strong center">Jane Doe</td>
						<td class="center">Europe <a href="" class="innerL text-underline">view on map <i class="icon-map-marker"></i></a></td>
						<td class="center">
							<div class="rating text-large text-faded read-only">
					        	<span class="star"></span>
					        	<span class="star"></span>
					        	<span class="star"></span>
					        	<span class="star"></span>
					        	<span class="star"></span>
					        </div>
						</td>
						<td class="center"><span class="strong text-large text-faded">2 <i class="icon-gift"></i></span></td>
					</tr>
					<tr>
						<td class="center"><img data-src="holder.js/50x50/dark" alt="Image" /></td>
						<td class="strong center">Hulky Bean</td>
						<td class="center">On the Moon <a href="" class="innerL text-underline">view on map <i class="icon-map-marker"></i></a></td>
						<td class="center">
							<div class="rating text-large text-faded read-only">
					        	<span class="star"></span>
					        	<span class="star"></span>
					        	<span class="star"></span>
					        	<span class="star"></span>
					        	<span class="star"></span>
					        </div>
						</td>
						<td class="center"><span class="strong text-large text-faded">1 <i class="icon-gift"></i></span></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	
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
<!-- // Stats Widgets END -->
<?php include('webkit/jquery_prog');?>
</body>
</html>