<?php wp_theme_debug(__FILE__, $output_to_header = true);

////////////////////////////////////////////////////////////
// search.php - default search display

get_header(); ?>
    <main style="background-image: url( '<?php echo get_template_directory_uri(); ?>/images/office.jpg' )"><?php
        if ( have_posts() ) : while ( have_posts() ) : the_post();
            get_template_part( 'content', get_post_format() );
        endwhile; else : // No content found
            get_template_part( 'content', 'none' );
        endif; ?>
    </main><?php

get_footer(); ?>
