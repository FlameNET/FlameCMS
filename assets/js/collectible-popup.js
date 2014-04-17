$(function(){
    CollectiblePopup.initialize();
});

var CollectiblePopup = {

    /**
     * DOM objects.
     */
    popup: null,

    cache: {},
    config: null,

    // Set in page source
    data: null,
    grid: null,
    msg: null,
    renderPath: '',
    itemPath: '',
    modelViewer: null,

    initialized: false,
    hoveringEntry : false,
    popupHovered: false,
    lastEntry: null,
    timer: null,

    POPUP_DELAY_MOUSEOVER: 250,
    POPUP_DELAY_REDUCED_FACTOR: 0.2,

    /**
     * Setup events.
     */
    initialize: function(config) {

        // Configure
        CollectiblePopup.config = $.extend({
            bindOnInit: true,
            bindQuery: '[data-collectible]'
        }, config);

        CollectiblePopup.initEvents();
    },

    /**
     * Bind the popup
     * @param query
     */
    bind: function(query){

        query = query || CollectiblePopup.config.bindQuery;

        $(query).live("mouseover.collectible",CollectiblePopup.entryMouseOver)
                .live("mouseleave.collectible", CollectiblePopup.entryMouseOut);

    },


    initEvents: function() {

        // Model Viewer / Popup
        CollectiblePopup.popup = $('<div />').attr("id","model-popup").addClass('model-popup').appendTo('body').hide();
        CollectiblePopup.popup
            .bind('click', CollectiblePopup.popupClick)
            .bind('mouseenter', CollectiblePopup.popupMouseOver)
            .bind('mouseleave', CollectiblePopup.popupMouseOut);

        // Bind popup
        if(CollectiblePopup.config.bindOnInit){
            CollectiblePopup.bind();
        }

    },

    isDragging: function() {
        if(CollectiblePopup.modelViewer){
            return CollectiblePopup.modelViewer.isDragging();
        }else{
            return false;
        }
    },

    dragCallback: function(dragging) {

        if(!dragging) { // When you stop dragging

            if(!CollectiblePopup.popupHovered) {
                CollectiblePopup.closePopup();
            }
        }
    },

    entryMouseOver: function(){
        CollectiblePopup.hoveringEntry = true;

        if(CollectiblePopup.isDragging()) {
            CollectiblePopup.lastEntry = this;
            return;
        }

        var _this = this;


        // Reduces delay when popup was recently closed
        var delay = CollectiblePopup.POPUP_DELAY_MOUSEOVER;
        if(CollectiblePopup.lastClosedPopup && ((new Date()).getTime() - CollectiblePopup.lastClosedPopup) < 100) {
            delay *= CollectiblePopup.POPUP_DELAY_REDUCED_FACTOR;
        }

        clearTimeout(CollectiblePopup.timer);
        CollectiblePopup.timer = setTimeout(function() {
            CollectiblePopup.openPopup(_this);
        }, delay);
    },

    entryMouseOut: function(e) {

        CollectiblePopup.hoveringEntry = false;

        // Prevents popup from opening if you don't hover it long enough
        clearTimeout(CollectiblePopup.timer);
    },

    popupClick: function(e) {
        // Prevents popup from closing when you click inside it
        e.stopPropagation();
    },

    popupMouseOver: function(e) {

        CollectiblePopup.popupHovered = true;
    },

    popupMouseOut: function(e) {

        CollectiblePopup.popupHovered = false;

        if(!CollectiblePopup.isDragging()) {
            CollectiblePopup.closePopup();
        }
    },

    /**
     * Open up the popup (w/ 3D model and details).
     *
     * @param node
     */
    openPopup: function(node) {

        if(!CollectiblePopup.isPopupOpen()){

            node = $(node);

            CollectiblePopup.preparePopup(node,function(){

                var $modelViewer = $(CollectiblePopup.popup).find("#model-cm");
                CollectiblePopup.modelViewer = ModelRotator.factory($modelViewer, {
                    zoom: false,
                    rotate: false,
                    dragCallback: CollectiblePopup.dragCallback
                });

                var renderPath = $(CollectiblePopup.popup).find(".details").data("render-path");
                CollectiblePopup.modelViewer.setImage(renderPath.replace('grid', 'rotate'));

                // Stat tooltips
                $(CollectiblePopup.popup).find('ul.stats li').bind("mouseover", CollectiblePopup.showStatTooltip);

                var offset = node.offset(),
                    popup = CollectiblePopup.popup,
                    pw = popup.outerWidth(),
                    ww = $(window).width(),
                    left = (offset.left + (node.width() / 2)) - (pw / 2);

                if ((left + pw) > ww)
                    left = ww - pw;

                popup.css({
                    left: left,
                    top: (offset.top + (node.height() / 2)) - (popup.height() / 2)
                });

                popup.show();
                setTimeout(function() {
                    Core.scrollToVisible(popup);
                }, 100);
            });

            if( Core.getBrowser().browser == 'ie'  && $(document.activeElement).attr('id') == 'filter-keyword' ){
            	$('#filter-keyword').blur();
            }
        }
    },

    preparePopup: function(node, callback) {

        var collectible = node.data("collectible"),
            slug = node.data("collectible-slug"),
            info = node.data("collectible-info"),
            url,
            key;

        // If there is a collected data hash for this creature
        if(info){
            url = Core.baseUrl + "/" + slug + "/" + collectible + "/tooltip?data=" + encodeURIComponent(info);
            key = (collectible+info).toString();
        }else{
            url = Core.baseUrl + "/" + slug + "/" + collectible + "/tooltip";
            key = collectible.toString();
        }

        if(CollectiblePopup.cache[key]){
            CollectiblePopup.popup.html(CollectiblePopup.cache[key]);
            callback();
        } else {
            $.ajax({
                type: "GET",
                url: url,
                dataType: "html",
                global: false,
                beforeSend: function() {
                    // Show "Loading..." tooltip when request is being slow
                    setTimeout(function() {
                        if (!CollectiblePopup.isPopupOpen()){
                            Tooltip.show(node, Msg.ui.loading, {location:"mouse"});
                        }
                    }, 200);
                },
                success: function(data) {
                    Tooltip.hide();

                    CollectiblePopup.cache[collectible+info] = data;
                    CollectiblePopup.popup.html(data);

                    callback();
                },
                error: function(xhr) {
                    if (xhr.status != 200){
                        Tooltip.hide();
                    }
                }
            });
        }

    },

    /**
     * Close the popup.
     */
    closePopup: function() {
        CollectiblePopup.popup.hide();
        CollectiblePopup.lastClosedPopup = (new Date()).getTime();
    },

    isPopupOpen: function() {
        return CollectiblePopup.popup.is(':visible');
    },

    /**
     * Static data tooltip for battle pet stats
     */
    showStatTooltip: function(){

        var $this = $(this);

        var title = $this.data("stat-title");
        var desc = $this.data("stat-desc");

        if(title && desc){

            var $tooltip = $('<ul/>').addClass('color-tooltip-yellow'); // Yellow overall
            $tooltip.html('<li><h3 class="color-q1">' + title  + '</h3></li><li>' + desc + '</li>');

            Tooltip.show(this, $tooltip);
        }
    }

};