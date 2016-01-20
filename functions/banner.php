<?php wp_template(__FILE__, true);

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
            'supports' => array('title', 'thumbnail'),
        ) );
});

add_action('wp_footer', function() {
    global $number_of_images;
    if(is_front_page() && $number_of_images > 1) { ?>
        <script type="text/javascript" charset="utf-8">
            hbPictureFader.init(6000);
        </script>
    <?php }
}, 90);

// banner()
//    returns the string for the homepage banner
function banner() {
    global $wp_query;

    $wp_query = new WP_Query( array( 'post_type' => 'banner' ) );

    $banner = '<div class="flexslider bannerslider"><ul class="slides">';

    if ( have_posts()) : while ( have_posts() ) : the_post();
        global $post;
        $img = get_the_post_thumbnail( $post->ID, 'large' );
        $banner .= '<li>' . $img . '<div class="caption">' . get_the_title();
        if (get_field('subtitle')) { $slider .= '<span>' . get_field('subtitle') . '</span>'; }
        $banner .= '</div></li>';
    endwhile; endif; wp_reset_query();

    $banner .= '</div>';

    return $banner;
}

add_shortcode('banner', 'insert_banner');
function insert_banner() { return banner(); }
function the_banner() { echo banner(); }

?>
