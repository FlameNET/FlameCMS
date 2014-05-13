<div id="blog-articles" class="blog-articles" itemscope="itemscope" itemtype="http://schema.org/Blog">
	<?php
	$connect = mysqli_connect($cms_host,$cms_user,$cms_pass,$cms_db);
	mysqli_set_charset($connect, "utf8");
	if(isset($_GET['new'])){
	$new = intval($_GET['new']);
	}else{
		$new = 0;
	}
	$news_first = $new ? $new : 9999999999;
	$news_query = ("SELECT * FROM news WHERE id <= '".$news_first."' ORDER BY `id` DESC LIMIT 8");
	$news_query = mysqli_query($connect, $news_query);
	$counter = 1;
	
	while($counter<=7 && $news=mysqli_fetch_array($news_query)){
	if($counter == 1){}else{}

	if($news['content'] == "")
	{
		$news['content'] = substr(strip_tags($news['content'],'<p><a><br><li><ol><ul>'),0,310);
	if (substr($news['content'], -1) == '<') 
	{
   		$news['content'] = substr($news['content'], 0, -1);
	}  

	$content = $news['content'];
	}
	else
	{
	$content = substr(strip_tags($news['content']),0,310);
	}
	if($news['contentlnk'] != NULL)
	echo '
	<div class="article-wrapper">
		<a href="'.$news['contentlnk'].'" itemprop="url">';
	echo '
		<div class="article-image" style="background-image:url(\'assets/images/news/'.$news['image'].'.jpg\')">
			<div class="article-image-frame"></div>
		</div>
			<div class="article-content" itemprop="blogPost" itemscope="itemscope" itemtype="http://schema.org/BlogPosting">
				<h2 class="header-2" >
					<span class="article-title" itemprop="headline">'.$news['title'].'</span>
				</h2>
				<span class="clear"><!-- --></span>
				<div class="article-summary" itemprop="description">'.$content."...".'</div>
				<span class="clear"><!-- --></span>
				<meta itemprop="datePublished" content="2014-03-05T15:58:48Z" />
				<meta itemprop="dateModified" content="2014-03-05T15:58:48Z" />
				<meta itemprop="inLanguage" content="en-GB" />
				<meta itemprop="interactionCount" content="UserComments:0" />
				<meta itemprop="thumbnailUrl" content="//bnetcmsus-a.akamaihd.net/cms/connect_thumbnail/W4FVJ7J5O3381390338339697.jpg" />
			</div>
		</a>
		<div class="article-meta">
			<span class="publish-date" title=" '.$news['date'].'"> '.ago(strtotime($news['date'])).'</span>
			<a href="news.php?id='.$news['id'].'#comments" class="comments-link">'.$news['comments'].'</a>
		</div>
		<span class="clear"><!-- --></span>
	</div>';
	$counter++;
	} ?>
</div>