<?php wp_theme_debug(__FILE__, $output_to_header = true);

/**
 * Login Customizations
 */


/**
 * Engueue styles and fonts for login
 */
add_action('login_enqueue_scripts', function() {
    wp_enqueue_style('style', get_template_directory_uri().'/style.css');
    wp_enqueue_style('roboto-font', 'https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic');
});


/**
 * Return the home url on clicking the login
 */
add_filter('login_headerurl', function() { return home_url(); });


/**
 * Return the description as the title
 */
add_filter('login_headertitle', function() { return get_bloginfo('description'); });


/**
 * Set the login redirect
 */
add_filter('login_redirect', function( $redirect_to, $request, $user ) {
    if ( isset( $user->roles ) && is_array( $user->roles ) ) {
        if( in_array('administrator', $user->roles)) { return admin_url(); }
    }
    return $redirect_to;
}, 10, 3);
