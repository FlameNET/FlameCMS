<?php
$connect = mysqli_connect($cms_host,$cms_user,$cms_pass,$cms_db);
mysqli_set_charset($connect, "utf8");
$articles_query = "SELECT * FROM news ORDER BY DATE DESC LIMIT 3";
$result = mysqli_query($connect, $articles_query);
while($articles = mysqli_fetch_array($result)) {
?>
<li>
<div class="article-wrapper">
		<a href="<?php/* echo $articles['id']; */?>" class="featured-news-link" data-category="wow" data-action="Blog_Click-Throughs" data-label="home 0 - eu - 12383903 - 12492647">
	<div class="article-image" style="background-image:url(assets/images/news/<?php echo $articles['image']; ?>.jpg)">
	<div class="article-image-frame"></div>
	</div>
	<div class="article-content">
		<span class="article-title" title="<?php echo $articles['title']; ?>"><?php echo $articles['title']; ?></span>
		<span class="article-summary"><?php echo $articles['content']; ?></span>
	</div>
		</a>
	<div class="article-meta">
		<a href="/wow/en/blog/12383903/free-character-migrations-available-05-03-2014#comments" class="comments-link"><?php echo $articles['comments']; ?></a>
		<span class="publish-date" title="<?php echo ago(strtotime($articles['date'])); ?>"><?php echo ago(strtotime($articles['date'])); ?></span>
	</div>
</div>
</li>
<?php } ?>