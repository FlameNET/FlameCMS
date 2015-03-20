<div id="slideshow" class="ui-slideshow">
        <div class="slideshow">
			<?php
			$slideshows = $connect->Connect()->query("SELECT * FROM slideshows ORDER BY id ASC LIMIT 5");
			$i=0;
			while($slideshow = mysqli_fetch_array($slideshows))
			{
			if($i == 0)
			{
			echo'<div class="slide" id="slide-0"
                    style="background-image: url(\'assets/images/slideshows/'.$slideshow['image'].'\'); ">
				</div>';
			}
			if($i != 0)
			{
			echo'<div class="slide" id="slide-1"
                    style="background-image: url(\'assets/images/slideshows/'.$slideshow['image'].'\'); display: none;">
                </div>';
			}
			$i++;
			}
			?>
        </div>

            <div class="paging">
                <a href="javascript:;" class="prev" onclick="Slideshow.prev();"></a>
                <a href="javascript:;" class="next" onclick="Slideshow.next();"></a>
            </div>

        <div class="caption">
            <h3><a href="javascript:;" class="link"></a></h3>
            
        </div>

        <div class="preview"></div>
        <div class="mask"></div>
    </div>
		<?php
		$slideshows = $connect->Connect()->query("SELECT * FROM slideshows ORDER BY id ASC LIMIT 5");
		?>
		<script type="text/javascript">
		//<![CDATA[
        $(function() {
            Slideshow.initialize('#slideshow', [
				<?php
				$i=0; 
				while($slideshow = mysqli_fetch_array($slideshows)){
				echo '
				{
				image: "assets/images/slideshows/'.$slideshow['image'].'",
				desc: "'.$slideshow['description'].'",
				title: "'.$slideshow['title'].'",
				url: "'.$slideshow['link'].'",
				id: "'.$slideshow['id'].'",
				duration: '.$slideshow['duration'].'
				}';
				if($i!=4){echo',';}
				$i++;
				}
				?>
            ]);

        });
		//]]>
		</script>