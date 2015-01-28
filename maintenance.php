<?php require_once('system/config.php'); ?>
<!doctype html>
<html>
<title>Site Maintenance</title>
<style>
html { background: url(<?php echo BASE_URL ?>assets/images/maintenance.jpg) no-repeat fixed center;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover; }
body { text-align: center; padding: 150px; }
h1 { font-size: 50px; }
body { font: 20px Helvetica, sans-serif; color: #fff; }
article { display: block; text-align: left; width: 650px; margin: 0 auto; }
a { color: #dc8100; text-decoration: none; }
a:hover { color: #fff; text-decoration: none; }
.shadow {text-shadow: 0 1px 0 #ccc, 0 1px 0 #c9c9c9,0 2px 0 #bbb,0 3px 0 #b9b9b9,0 4px 0 #aaa,0 5px 1px rgba(0,0,0,.1),0 0 5px rgba(0,0,0,.1),0 1px 3px rgba(0,0,0,.3),0 3px 5px rgba(0,0,0,.2),0 5px 10px rgba(0,0,0,.25),0 10px 10px rgba(0,0,0,.2),0 20px 20px rgba(0,0,0,.15);color: #fff;}
.shadows {color: #f2f2f2;text-shadow: 0px -1px 0px #424242;}
</style>
<body>
<article>
    <h1 class="shadow">We&rsquo;ll be back soon!</h1>
    <div>
        <p class="shadows">Sorry for the inconvenience but we&rsquo;re performing some maintenance at the moment. If you need to you can always <a href="mailto:#">contact us</a>, otherwise we&rsquo;ll be back online shortly!</p>
        <p class="shadows">&mdash; The Team FlameNET</p>
    </div>
</article>
</body>
</html>