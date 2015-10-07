<div id="blog-articles" class="blog-articles">
	<?php
	if(isset($_GET['new'])){
	$new = intval($_GET['new']);
	}else{
		$new = 0;
	}
	$row_first = $new ? $new : 9999999999;
	$row_query = $connect->WebQuery("SELECT * FROM news WHERE id <= '{$row_first}' ORDER BY `id` DESC LIMIT 8");
	$counter = 1;
	while($counter<=7 && $row = $row_query->fetch_array()){
	if($counter == 1){
		// $counter
	}else{
		// $counter
	}
	if($row['contentlnk'] != NULL)
	?>
	<div class="article-wrapper">
		<a href="<?php echo BASE_URL.'blog/'.$row['id'].'/'.$url->CleanString($row['title']); ?>/" itemprop="url">
		<div class="article-image" style="background-image:url(assets/images/news/<?php echo $row['image']; ?>.jpg)">
			<div class="article-image-frame"></div>
		</div>
			<div class="article-content" itemprop="blogPost" itemscope="itemscope" itemtype="http://schema.org/BlogPosting">
				<h2 class="header-2" >
					<span class="article-title" itemprop="headline"><?php echo $row['title']; ?></span>
				</h2>
				<span class="clear"><!-- --></span>
				<div class="article-summary" itemprop="description"><?php echo $news->NewsWordLimit($row['content']); ?></div>
				<span class="clear"><!-- --></span>
				<meta itemprop="datePublished" content="<?php echo $news->AgoTimeFlame($row['date']); ?>" />
				<meta itemprop="dateModified" content="<?php echo $news->AgoTimeFlame($row['date']); ?>" />
				<meta itemprop="inLanguage" content="en-GB" />
				<meta itemprop="interactionCount" content="UserComments:0" />
				<meta itemprop="thumbnailUrl" content="<?php echo BASE_URL ?>assets/images/news/<?php echo $row['image']; ?>.jpg" />
			</div>
		</a>
		<div class="article-meta">
			<span class="publish-date" title="<?php echo $row['date']; ?>"><?php echo $news->AgoTimeFlame($row['date']); ?></span>
			<a href="<?php echo BASE_URL.'blog/'.$row['id'].'/'.$url->CleanString($row['title']); ?>/#comments" class="comments-link"><?php echo $row['comments']; ?></a>
		</div>
		<span class="clear"><!-- --></span>
	</div>
	<?php
	$counter++;
	}
	?>
</div>