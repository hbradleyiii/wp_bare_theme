<?php wp_theme_debug(__FILE__, $output_to_header = true);

////////////////////////////////////////////////////////////
// 404 - page not found template

get_header(); ?>
    <main>
        <?php get_template_part( 'content', 'none' ); ?>
    </main><?php

get_footer();
