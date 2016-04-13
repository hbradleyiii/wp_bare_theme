var $ = jQuery;

function log(data) { console.log(data) }

// Get the width of the viewport
function window_width() {
    // Temporarily remove the scrollbar for an accurate width reading
    document.body.style.overflow = "hidden";
    var width = $(window).width();
    document.body.style.overflow = "";
    return width;
}

// Check if screen is mobile
function is_mobile() { return window_width() <= 1000; }

$( document ).ready( function() {

});

