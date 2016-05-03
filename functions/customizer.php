<?php wp_template(__FILE__, true);

////////////////////////////////////////////////////////////
// functions/customizer.php - Customizer hooks and functions


// wp_add_controls()
//      Takes an array of contorl=>labels and a section and sets up the
//      controls for the customizer.
function wp_add_controls($wp_customize, $section, $controls, $type) {
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
    wp_add_controls( $wp_customize, 'social_media', $controls, 'url' );
});

?>
