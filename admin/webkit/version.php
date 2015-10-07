<?php
if(isset($_GET['new'])){
$vers = intval($_GET['new']);
}else{
	$vers = 0;
}
$vers_query = WebQuery("SELECT * FROM cms_ver WHERE id = 1 ORDER BY `id` DESC LIMIT 1");
$counter = 1;

while($counter<=7 && $vers=mysqli_fetch_array($vers_query)){
if($counter == 1){}else{}
$counter++;
?>

<div id="footer" class="hidden-print">		
<!--  Copyright Line -->

<div class="copy">&copy; 2010 - 2015 - <a href="http://flamenet.github.io/FlameCMS/">FlameNET</a> - All Rights Reserved. <a href="http://flamenet.github.io/FlameCMS/" target="_blank"> FlameNET & AquaFlameNET</a> - Current version: v<?php echo ' '.$vers['version'].' ';?> @ <?php echo ''.$vers['last_update'].'';?> / <a target="_blank" href="https://github.com/FlameNET/FlameCMS/commits/master">progress</a></div>
<!--  End Copyright Line -->
<?php } ?>
</div>
