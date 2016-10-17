<?php wp_theme_debug(__FILE__, $output_to_header = true);

/**
 * Functions for customizer hooks and functions
 */


/**
 * A wrapper function to register control settings
 *
 * @param WP_Customize $wp_customize
 * @param string $section
 * @param array $controls
 * @param string $type
 *
 * @return null
 */
function wp_add_settings_and_controls($wp_customize, $section, $controls, $type) {
    foreach ($controls as $control => $label) {
        $wp_customize->add_setting($control);
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                $control . '_control',
                array(
                    'label'       => $label,
                    'section'     => $section,
                    'settings'    => $control,
                    'type'        => $type,
                )
            )
        );
    }
}


/**
 * Returns the string for the company address
 *
 * See also corresponding the_address() function for displaying the company
 * address.
 *
 * @return string
 */
add_action( 'customize_register', function($wp_customize) {
    $wp_customize->add_section( 'social_media', array(
        'title' => 'Social Media Links',
        'priority' => 30
    ));
    $controls = array(
        'link_facebook'      => 'Facebook URL',
        'link_twitter'       => 'Twitter URL',
        'link_youtube'       => 'Youtube URL',
    );
    wp_add_settings_and_controls( $wp_customize, 'social_media', $controls, 'url' );
});
