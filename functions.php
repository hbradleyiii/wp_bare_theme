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
    if ( !is_admin() ) {
        wp_deregister_script( 'jquery' );
        wp_enqueue_script('jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true);
    }
    if ( WP_DEBUG ) {
        wp_enqueue_script('bootstrap', $template_dir_uri . '/js/bootstrap.js', array('jquery'), NULL, true);
    } else {
        wp_enqueue_script('bootstrap_min', $template_dir_uri . '/js/bootstrap.min.js', array('jquery'), NULL, true);
    }
    wp_enqueue_script('scripts', $template_dir_uri . '/js/scripts.js', array('jquery'), NULL, true);
    wp_enqueue_script('smoothscroll', $template_dir_uri . '/js/smoothscroll.js', array('jquery'), NULL, true);

    // Styles
    wp_enqueue_style( 'theme_style', get_stylesheet_uri() );
    wp_enqueue_style('roboto-font', 'https://fonts.googleapis.com/css?family=Roboto:100,300,300italic,400,700,700italic');

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

// Replace excerpt ellipse with 'Read more...' link
add_filter('excerpt_more', function( $text ) { return str_replace('[&hellip;]', ' [<a href="'.get_permalink().'">Read more...</a>]', $text); });

// Wordpress Optimizations
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );

add_action( 'wp_head', function() {
    echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}, 0);

// wp_indent()
//      indents output from a function with $indent_level number of indents.
function wp_indent($function, $indent_level = 1) {
    $indent = "    ";
    ob_start();
    $function();
    $contents = ob_get_contents();
    ob_end_clean();
    echo preg_replace("/\n/", "\n" . $indent, substr($contents, 0, -1));
    echo "\n";
}

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

// Auto-reloading code.
// Using site-watch bash script for updating site-watch file.
// Note that XDEBUG_SESSION cookie must be set for this to work!
if ( WP_DEBUG && isset($_COOKIE['XDEBUG_SESSION']) ) { add_action( 'wp_footer', function() { ?>
    <script type='text/javascript'>
        jQuery( function ($) {
            var last_update = 0;
            var start_time = Date.now();

            function init( response ) {
                last_update = get_update_time( response );
                process = process_watch;
                process_watch ( response );
                console.log( 'Watching for updates...' );
            }

            function process_watch( response ) {
                if ( last_update < get_update_time( response ) ) {
                    console.log( 'Reloading to updated page...' );
                    location.reload();
                } else if ( Date.now() < start_time + 3600000 ) {
                    setTimeout( check_watch, 800 );
                }
            }

            function check_watch() {
                $.ajax({
                    url: '<?php echo get_template_directory_uri() . '/.site-watch'; ?>',
                    success: process,
                    error: function () { console.warn( 'Site Watch is not running! Set up site-watch on server and reload the page.' ); }
                });
            }

            function get_update_time( response ) {
                return parseInt( response.split( '\n' ) );
            }

            var process = init;
            check_watch();
        });
    </script>
<?php }); }

?>
