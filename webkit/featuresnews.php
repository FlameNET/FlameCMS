<?php
$articles_query = $connect->Connect()->query("SELECT * FROM news ORDER BY DATE DESC LIMIT 3");
while($articles = mysqli_fetch_array($articles_query)) {
?>
<li>
	<div class="article-wrapper">
			<a href="<?php echo BASE_URL.'blog/'.$articles['id'].'/'.$url->CleanString($articles['title']); ?>/" class="featured-news-link" data-category="wow" data-action="Blog_Click-Throughs" data-label="home 0 - eu - 12383903 - 12492647">
		<div class="article-image" style="background-image:url(assets/images/news/<?php echo $articles['image']; ?>.jpg)">
		<div class="article-image-frame"></div>
		</div>
		<div class="article-content">
			<span class="article-title" title="<?php echo $articles['title']; ?>"><?php echo $articles['title']; ?></span>
			<span class="article-summary"><?php echo $articles['content']; ?></span>
		</div>
			</a>
		<div class="article-meta">
			<a href="<?php echo BASE_URL.'blog/'.$articles['id'].'/'.$url->CleanString($articles['title']); ?>/#comments" class="comments-link"><?php echo $articles['comments']; ?></a>
			<span class="publish-date" title="<?php echo $news->ago(strtotime($articles['date'])); ?>"><?php echo $news->ago(strtotime($articles['date'])); ?></span>
		</div>
	</div>
</li>
<?php } ?>