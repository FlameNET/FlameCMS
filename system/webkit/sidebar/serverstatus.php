<div class="sidebar-module " id="sidebar-arcade">
	<div class="sidebar-title">
		<h3 class="header-3 title-arcade">Server Status</h3></div><br/>
    <div class="text-area-2" style="font-size:12px">
		 Realmlist: Set realmlist <font color='#1eda1a'><?php echo REALMLIST ?></font>
	</div>
	<div class="text-area-2"> Accounts:<span class="date text-area-2">
	<?php
	$acct_sql = $connect->Auth()->query("SELECT COUNT(*) FROM account");
	$acc = MysqliResultFlame($acct_sql);
	echo ("<font color='#1eda1a'>$acc</font>");
	?>
	Registered Accounts</span></div>
	<?php
	$sql = $connect->Auth()->query("SELECT * FROM `uptime` ORDER BY `starttime` DESC LIMIT 1");  
	$uptime_results = $sql->fetch_array();    

	if ($uptime_results['uptime'] > 86400) { 
		$uptime =  round(($uptime_results['uptime'] / 24 / 60 / 60),2)." Days";
	}
	elseif($uptime_results['uptime'] > 3600) { 
		$uptime =  round(($uptime_results['uptime'] / 60 / 60),2)." Hours";
	}
	else { 
		$uptime =  round(($uptime_results['uptime'] / 60),2)." Min";
	}?>
	<div class="text-area-2">Uptime:
		<span class="date text-area-2">
			<font color="#1eda1a"><?php echo "$uptime"; ?></font>
		</span>
	</div>
</div>