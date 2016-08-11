<?php wp_theme_debug(__FILE__, $output_to_header = true);

////////////////////////////////////////////////////////////
// single.php - default single post template

get_header(); ?>
    <main>
        <?php the_breadcrumbs(); ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'content', get_post_format() ); ?>
        <?php endwhile; ?>
    </main><?php

get_footer(); ?>
