<?php wp_theme_debug(__FILE__, $output_to_header = true);

////////////////////////////////////////////////////////////
// banner.php - Custom Post Type Banner

// Add custom post type Banner
add_action( 'init', function() {
    register_post_type( 'banner', array (
            'labels' => array (
                    'name' => 'Banner Images',
                    'singular_name' => 'Banner Image',
                ),
            'description' => 'Front Page Banner Images',
            'public' => false,
            'show_ui' => true,
            'publicly_queryable' => false,
            'exclude_from_search' => true,
            'menu_position' => 21,
            'show_in_nav_menus' => false,
            'menu_icon' => 'dashicons-images-alt2',
            'rewrite' => false,
            'has_archive' => false,
            'supports' => array('title', 'thumbnail', 'revisions'),
        ) );
});

// banner()
//    returns the string for the homepage banner
function banner() {
    global $wp_query;

    $wp_query = new WP_Query( array( 'post_type' => 'banner' ) );

    $indicators = '';
    $slides = '';
    $i = 0;

    if ( have_posts()) : while ( have_posts() ) : the_post();
        global $post;

        $img = get_the_post_thumbnail( $post->ID, 'full' );
        $class = ($i == 0 ? 'active' : '');

        $url = get_field( 'banner_link' );

        $slide = '
                <li class="item '.$class.'">
                    <h3 class="carousel-caption"><a href="' . $url . '">' . get_the_title() . '</a></h3>
                    ' . $img . '
                </li>
            ';

        $slides .= $slide;

        $indicators .= '                 <li data-target="#main_banner" data-slide-to="' . $i . '" class="' . $class . '"></li>' . "\n";

        $i++;
    endwhile; else: return ''; endif; wp_reset_query();

    return '
        <div id="main_banner" class="carousel slide" data-ride="carousel">
            <!-- Slides -->
            <ul class="carousel-inner" role="listbox">
                ' . $slides . '
            </ul>

            <!-- Indicators -->
            <ul class="carousel-indicators">' . "\n" .  $indicators . '            </ul>

            <!-- Prev/Next Controls -->
            <a class="left carousel-control" href="#main_banner" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#main_banner" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        ';
}
add_shortcode('banner', 'insert_banner');
function insert_banner() { return banner(); }
function the_banner() { echo banner(); }
