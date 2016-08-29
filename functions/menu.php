<?php wp_theme_debug(__FILE__, $output_to_header = true);

////////////////////////////////////////////////////////////
// menu.php - menu functions and custom nav menu walker class


add_action('init', function() {
    register_nav_menu('navigation-menu', 'Main Navigation Menu');
});

function get_the_nav_menu( $depth = 1 ) {
    if ( has_nav_menu( 'navigation-menu' ) ) {
        return wp_nav_menu( array(
            'container'       => false,
            'depth'           => $depth,
            'theme_location'  => 'navigation-menu',
            'items_wrap'      => '%3$s',
            'walker'          => new CO_NavWalker(),
            'echo'            => false,
        ) );
    }
}
function the_nav_menu( $depth = 1 ) { echo get_the_nav_menu( $depth ); }


// Custom Walker Navigation class
class CO_NavWalker extends Walker_Nav_Menu {

    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth + 2);

        if( $depth == 0 ) {
            $class_name = 'submenu';
        } else {
            $class_name = 'hide';
        }

        $output .= "\n$indent<nav class=\"$class_name\">";
    }

    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth + 2);
        $output .= "\n$indent</nav></div>\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $indent = str_repeat("\t", $depth + 2);

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
        $class_names = $class_names ? esc_attr( $class_names ) : '';

        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';
        $atts['class']  = $class_names;

        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $item_output = '';

        if ($args->walker->has_children && $args->depth > 1) {
            $item_output .= "\n$indent<div class=\"supermenu\">\n";
        }
        $item_output .= "\n$indent<a$attributes>" . apply_filters( 'the_title', $item->title, $item->ID ) . '</a>';

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    // Not Used
    function end_el( &$output, $item, $depth = 0, $args = array() ) { }
}
