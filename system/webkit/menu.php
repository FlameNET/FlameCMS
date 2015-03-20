<ul class="menu" id="menu">

<?php
if(isset($page))
{
	$menus = $connect->Connect()->query("SELECT * FROM menu");
	while($menu = mysqli_fetch_array($menus))
	{
?>
	<li class="<?php echo $menu["menu_class"]; ?>" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
		<a itemprop="url" href="<?php echo BASE_URL.$menu["menu_url"]; ?>" <?php if($page==$menu["menu_class"]) echo'class="menu-active"'; ?> >
			<span itemprop="name"><?php echo $menu["menu_$lang"]; ?></span>
		</a>
	</li>
<?php
	}
?>
</ul>
<?php
}
else
{
	$menus = $connect->Connect()->query("SELECT * FROM menu");
	while($menu = mysqli_fetch_array($menus))
	{
?>
	<li class="<?php echo $menu["menu_class"]; ?>" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
		<a itemprop="url" href="<?php echo BASE_URL.$menu["menu_url"]; ?>">
			<span itemprop="name"><?php echo $menu["menu_$lang"]; ?></span>
		</a>
	</li>
<?php
	}
}
?>
</ul>

