<?php wp_template(__FILE__, true);

////////////////////////////////////////////////////////////
// functions/customizer.php - Customizer hooks and functions

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
    foreach ($controls as $control => $label) {
        $wp_customize->add_setting($control);
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                $control . '_control',
                array(
                    'label'       => $label,
                    'section'     => 'social_media',
                    'settings'    => $control,
                    'type'        => 'url'
                )
            )
        );
    }
});

?>
