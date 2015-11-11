<?php wp_template(__FILE__, true);

////////////////////////////////////////////////////////////
// functions.php - functions and customizations for theme


$template_dir = get_template_directory();

require_once($template_dir . '/functions/admin.php');
require_once($template_dir . '/functions/banner.php');
require_once($template_dir . '/functions/breadcrumbs.php');
require_once($template_dir . '/functions/company-info.php');
require_once($template_dir . '/functions/login.php');
require_once($template_dir . '/functions/menu.php');


////////////////////////////////////////////////////////////
// Scripts and Style Sheets
add_action('wp_enqueue_scripts', function() {

    global $wp_styles;

    $template_dir_uri = get_template_directory_uri();
	
    // Scripts
	wp_register_script('scripts', $template_dir_uri.'/scripts.js', array('jquery'), false, true);
	wp_register_script('contact-form', $template_dir_uri.'/contact-form.js', array('jquery'), false, true);

	wp_enqueue_script('scripts');
	wp_enqueue_script('contact-form');

    // Styles
	wp_enqueue_style( 'theme_style', get_stylesheet_uri() );
	wp_register_style('roboto-font', 'https://fonts.googleapis.com/css?family=Roboto:100,300,300italic,400,700,700italic');

	wp_enqueue_style('style');
	wp_enqueue_style('roboto-font');

	if( is_front_page() ) {
        // Front page
    }

}, 99);

add_action( 'after_setup_theme', function() {
    add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );
});

// When ContactForm 7 is initialized, enqueue contact_form script in footer
add_action( 'wpcf7_enqueue_scripts', function() { 
    wp_enqueue_script('contact-form', get_template_directory_uri().'/contact-form.js', false, false, true);
} );

// Wordpress Optimizations
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );

add_action( 'wp_head', function() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}, 0);

// wp_template()
//      default setup for wordpress php template files
function wp_template($file, $debug_in_header = false) {
    // When file is called directly, immediately redirect to a 404 page
    if ( ! defined( 'ABSPATH' ) ) { 
        header('Location: /error-404-page-not-found'); 
        die(); 
    }

    // Debugging
    if ( WP_DEBUG ) { 
        $filestamp = function() use ($file) {
                date_default_timezone_set( 'America/Louisville' );
                echo "\n<!-- [" . date( 'H:i:s T' ) . '] [' . timer_stop() . ' seconds] [' .
                    get_num_queries() . ' queries] Called file: "' . $file . '" -->' . "\n\n";
            };
        if ( $debug_in_header ) {
            // Print the template filename in the header
            add_action('wp_head', $filestamp);
        } else { // or just echo it out where ever it is called
            $filestamp();
        }
    }
}

?>
