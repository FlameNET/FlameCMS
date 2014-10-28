(function($){

    var root = $('script[src$="js/docs.js"]')[0].src.replace('js/docs.js', '..');

    // update dynamically version and download url in docs
    $.get(root+"/package.json", {nocache: Math.random()}, function(data){

        $(function(){
            $("[data-uikit-download]").attr("href", "https://github.com/uikit/uikit/releases/download/v"+data.version+"/uikit-"+data.version+".zip")
            $("[data-uikit-version]").text("Version "+data.version);
        });

    }, 'json');

    $(function() {

        if (window.hljs) {
            $('pre > code').each(function(i, e) { hljs.highlightBlock(e); });
        }

        $('article').on('click', '[href="#"], [href=""]', function (e) {
            e.preventDefault();
        });

    });

})(jQuery);

// google analytics
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-42150424-1', 'getuikit.com');
ga('send', 'pageview');

jQuery(function($) {

    $('[data-uikit-download]').on('click', function() {
        ga('send', 'event', 'UIkit', 'Download', $(this).attr('href').match(/uikit-(\d+\.\d+\.\d+)/)[1]);
    });

});
