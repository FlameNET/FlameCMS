<div id="blog-articles" class="blog-articles" itemscope="itemscope" itemtype="http://schema.org/Blog">
	<?php
	if(isset($_GET['new'])){
	$new = intval($_GET['new']);
	}else{
		$new = 0;
	}
	$news_first = $new ? $new : 9999999999;
	Connect()->query("SET NAMES 'utf8'");
	$news_query = Connect()->query("SELECT * FROM news WHERE id <= '".$news_first."' ORDER BY `id` DESC LIMIT 8");
	$counter = 1;
	while($counter<=7 && $news=mysqli_fetch_array($news_query)){
	if($counter == 1){}else{}
	if($news['contentlnk'] != NULL)
	?>
	<div class="article-wrapper">
		<a href="<?php echo BASE_URL.'blog/'.$news['id'].'/'.CleanString($news['title']); ?>/" itemprop="url">
		<div class="article-image" style="background-image:url(assets/images/news/<?php echo $news['image']; ?>.jpg)">
			<div class="article-image-frame"></div>
		</div>
			<div class="article-content" itemprop="blogPost" itemscope="itemscope" itemtype="http://schema.org/BlogPosting">
				<h2 class="header-2" >
					<span class="article-title" itemprop="headline"><?php echo $news['title']; ?></span>
				</h2>
				<span class="clear"><!-- --></span>
				<div class="article-summary" itemprop="description"><?php echo NewsWordLimit($news['content']); ?></div>
				<span class="clear"><!-- --></span>
				<meta itemprop="datePublished" content="2014-03-05T15:58:48Z" />
				<meta itemprop="dateModified" content="2014-03-05T15:58:48Z" />
				<meta itemprop="inLanguage" content="en-GB" />
				<meta itemprop="interactionCount" content="UserComments:0" />
				<meta itemprop="thumbnailUrl" content="<?php echo BASE_URL ?>assets/images/news/<?php echo $news['image']; ?>.jpg" />
			</div>
		</a>
		<div class="article-meta">
			<span class="publish-date" title="<?php echo $news['date']; ?>"><?php echo ago(strtotime($news['date'])); ?></span>
			<a href="<?php echo BASE_URL.'blog/'.$news['id'].'/'.CleanString($news['title']); ?>/#comments" class="comments-link"><?php echo $news['comments']; ?></a>
		</div>
		<span class="clear"><!-- --></span>
	</div>
	<?php
	$counter++;
	}
	?>
</div>