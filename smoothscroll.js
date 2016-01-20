///////////////////////
// Smooth scrolling
//  requires: jQuery, TweenMax, and ScrollToPlugin
jQuery(function(){

    var scrollTime = .7;
    var scrollDistance = 150;

    jQuery(window).on("mousewheel DOMMouseScroll", function(event){

        event.preventDefault();

        var delta = event.originalEvent.wheelDelta/120 || -event.originalEvent.detail/3;
        var scrollTop = jQuery(window).scrollTop();
        var finalScroll = scrollTop - parseInt(delta*scrollDistance);

        TweenMax.to(jQuery(window), scrollTime, {
            scrollTo : { y: finalScroll, autoKill:true },
                ease: Power1.easeOut,
                overwrite: 5
            });

    });
});
