<!-- NEW VERSION -->
<!-- Realmlist -->
<div class="right-sidebar">
	<!-- Players Online / Status Bar-->
	<?php
	$RealmQuerySQL = $connect->WebQuery("SELECT * FROM realms WHERE Id");
	while($Realm = $RealmQuerySQL->fetch_array()){
	?>
	<div class="sts a-realm sidebar-container box-shadow">
		<div id="head" class="clearfix text-shadow">
			<p id="name">
				<?php echo $Realm['realmName']; ?>
			</p>
			<p id="info">
				<?php echo $Realm['rate']; ?> Rates
			</p>
		</div>
		<div id="body" class="clearfix text-shadow">
			<p id="online">
				<?php
				$OnlineQuerySQL = $connect->Characters()->query("SELECT COUNT(*) FROM characters WHERE online='1'");
				$OnlinePlayers	= MysqliResultFlame($OnlineQuerySQL);
				?>
				<font color="#d28010"><?php echo $OnlinePlayers ?></font> Players Online
			</p>
			<p id="uptime">
				<?php
				$sql = $connect->AuthQuery("SELECT * FROM `uptime` WHERE realmid='{$Realm['Id']}' ORDER BY `starttime` DESC LIMIT 1");  
				$uptime_results = $sql->fetch_array();    

				if ($uptime_results['uptime'] > 2592000){
					$uptime =  round(($uptime_results['uptime'] / 30 / 24 / 60 / 60),2)." Months";
				}
				elseif ($uptime_results['uptime'] > 86400){
					$uptime =  round(($uptime_results['uptime'] / 24 / 60 / 60),2)." Days";
				}
				elseif ($uptime_results['uptime'] > 3600){
					$uptime =  round(($uptime_results['uptime'] / 60 / 60),2)." Hours";
				}else{
					$uptime =  round(($uptime_results['uptime'] / 60),2)." Min";
				}
				?>
				<font color="#5b5851"><?php echo $uptime ?></font> Uptime
			</p>
		</div>
	</div>
	<?php
	}
	?>
	<div class="realmlist realm_cont_show">
		<p>
			set realmlist <font color="#817464"><?php echo REALMLIST ?></font>
		</p>
	</div>
	<!-- Vote Gifts -->
	<div class="vote_box">
		<div class="vote_image">
		</div>
		<h2>Monthly rewards will be given to the Top Voters. 50 silver coins for the Top 5 and an additional 10 gold coins for Top 1.</h2>
	</div>
	<!-- Server Progress -->
	<div class="stat_count_show">
		<div class="category" id="srv-stat-h">
			<span class="category-text"><a href="#">Private Status</a></span>
		</div>
		<div id="srv-stat">
			<div class="srv-bar">
				<div class="srv-bar-wrapp" title="12">
					<div class="un">
					</div>
					<div class="data-wrapp">
						<div class="works" title="123" style="width:22.09634276654%;">
							<span></span>
						</div>
						<div class="noworks" title="12" style="width:1.5982197046328%;">
							<span></span>
						</div>
					</div>
				</div>
			</div>
			<span>Quests</span>
			<div class="srv-bar">
				<div class="srv-bar-wrapp" title="77">
					<div class="un">
					</div>
					<div class="data-wrapp">
						<div class="works" title="23" style="width:31.012312169%;">
							<span></span>
						</div>
						<div class="noworks" title="2" style="width:1.2323943661972%;">
							<span></span>
						</div>
					</div>
				</div>
			</div>
			<span>Achievement</span>
			<div class="srv-bar">
				<div class="srv-bar-wrapp" title="34">
					<div class="un">
					</div>
					<div class="data-wrapp">
						<div class="works" title="5" style="width:5.111231257611%;">
							<span></span>
						</div>
						<div class="noworks" title="1" style="width:0.58548009367681%;">
							<span></span>
						</div>
					</div>
				</div>
			</div>
			<span>Instances</span>
			<div class="srv-bar">
				<div class="srv-bar-wrapp">
					<div class="un">
					</div>
					<div class="data-wrapp" title="19">
						<div class="works" title="1676" style="width:3.63571231625%;">
							<span></span>
						</div>
						<div class="noworks" title="3" style="width:0.16939582156973%;">
							<span></span>
						</div>
					</div>
				</div>
			</div>
			<span>Spell / Class</span>
		</div>
	</div>
</div>
<!-- Sidebar END -->