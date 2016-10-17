<?php wp_theme_debug(__FILE__, $output_to_header = true);

/**
 * Admin Customization
 */


/**
 * Hide the front-end admin bar when logged in
 */
add_filter( 'show_admin_bar', function() {
    remove_action( 'wp_head', '_admin_bar_bump_cb' );
    return false;
});


/**
 * Hide wysiwyg editor for home page
 */
add_action( 'edit_form_after_editor', function($post) {
    if( $post->ID == get_option('page_on_front') ) {
        echo '<style>#postdivrich { display: none; }</style>';
    }
});


/**
 * Hide Comments and Posts menu items
 */
add_action( 'admin_menu', function() {
    /* remove_menu_page('edit-comments.php'); */
    /* remove_menu_page('edit.php'); */
});


/**
 * Customize tinymce
 */
add_filter('tiny_mce_before_init', function($init) {
    $init['block_formats'] = 'Paragraph =p;Header 2=h2;Header 3=h3;Header 4=h4';
    $init['toolbar2'] = 'formatselect,underline,alignjustify,forecolor,pastetext,removeformat,charmap,undo,redo,wp_help';
    $default_colours = '
        "39b54a", "Green",
        "000000", "Black",
        "1c1c1c", "Very dark grey",
        "242424", "Dark Grey",
        "8d8d8d", "Grey",
        "d4d4d4", "Light Grey",
        "e1e1e1", "Off White",
        "ffffff", "White",
        ';
    $init['textcolor_map'] = '['.$default_colours.']';
    return $init;
});


/**
 * Setup Site Settings Menu
 */
add_action('admin_menu', function() {
    add_options_page(
        'Site Settings',  // Page Title
        'Site Settings', // Menu Title
        'administrator', // Permissions
        'site_settings_page',  // Menu Slug
        function() { // Function used to display these settings ?>
            <h2>General Website Settings</h2>
            <form method="post" action="options.php">
                <?php settings_fields( 'site_settings' ); ?>
                <?php do_settings_sections( 'site_settings_page' ); ?>
                <?php submit_button(); ?>
            </form><?php
        }
    );
});


/**
 * Register Site Settings Fields
 */
add_action('admin_init', function() {

    add_settings_section(
        'co_general_section',
        'General Settings',
        null,
        'site_settings_page'
    );

    add_settings_field(
        'co_address',
        'Company Address',
        'wp_display_settings_field',
        'site_settings_page',
        'co_general_section',
        array(
            'description' => 'Street Address',
            'input_type'  => 'text',
            'input_name'  => 'co_address',
            'input_size'  => '50'
        )
    );

    add_settings_field(
        'co_city',
        'City',
        'wp_display_settings_field',
        'site_settings_page',
        'co_general_section',
        array(
            'description' => 'City',
            'input_type'  => 'text',
            'input_name'  => 'co_city',
            'input_size'  => '10'
        )
    );

    add_settings_field(
        'co_state',
        'State',
        'wp_display_settings_field',
        'site_settings_page',
        'co_general_section',
        array(
            'description' => 'State',
            'input_type'  => 'text',
            'input_name'  => 'co_state',
            'input_size'  => '2'
        )
    );

    add_settings_field(
        'co_zipcode',
        'Zipcode',
        'wp_display_settings_field',
        'site_settings_page',
        'co_general_section',
        array(
            'description' => 'Zipcode',
            'input_type'  => 'text',
            'input_name'  => 'co_zipcode',
            'input_size'  => '5'
        )
    );

    add_settings_field(
        'co_phone',
        'Company Phone Number',
        'wp_display_settings_field',
        'site_settings_page',
        'co_general_section',
        array(
            'description' => 'The company phone number.',
            'input_type'  => 'text',
            'input_name'  => 'co_phone',
            'input_size'  => '12'
        )
    );

    register_setting( 'site_settings', 'co_address' );
    register_setting( 'site_settings', 'co_city' );
    register_setting( 'site_settings', 'co_state' );
    register_setting( 'site_settings', 'co_zipcode' );
    register_setting( 'site_settings', 'co_phone' );
});


/**
 * Display settings field inputs
 *
 * @param  array $args - an array of arguments for displaying an input
 *
 * @return null
 */
function wp_display_settings_field($args) {
    $value = get_option($args['input_name']);
    $type = $args['input_type'];
    $size = $args['input_size'];
    $description = $args['description'];
    $id = $name = $args['input_name'];?>

    <input type="<?= $type ?>" name="<?= $name ?>" id="<?= $id ?>" value="<?= $value ?>" size="<?= $size ?>" />
    <p class="description"><?= $description ?></p><?php
}
