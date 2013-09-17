$(function() {
    $('.field, textarea').focus(function() {
        if(this.title==this.value) {
            this.value = '';
        }
    }).blur(function(){
        if(this.value=='') {
            this.value = this.title;
        }
    });
    $("#slider").jcarousel({
        scroll: 1,
        auto: 4,
        initCallback: mycarousel_initCallback,    
         wrap: 'both',    
         itemVisibleInCallback: {
            onAfterAnimation: function(c, o, i, s) {
                $('.jcarousel-control a').removeClass('active');
                $('.jcarousel-control a:eq('+ (i-1) +')').addClass('active');
            }
        }
    });
     if ($.browser.msie && $.browser.version.substr(0,1)<7) {
        DD_belatedPNG.fix(' #drop-shadow, #footer-shadow, #logo-footer a, #wrapper-top, #wrapper-middle, .list-vitae ul li, #search, #logo a, .submit-button, .btn-slider, .image, #slider ,img, #sidebar, .btn-main, .frame-welcome, .frame-quisque-vitae, #wrapper-bottom, #footer');
    }
});
function mycarousel_initCallback(carousel) {
    $('.jcarousel-control a').bind('click', function() {
        $('.jcarousel-control a').removeClass('active');
        $(this).addClass('active');
        carousel.scroll(jQuery.jcarousel.intval(jQuery(this).text()));
        return false;
    });
};