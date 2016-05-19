<?php wp_template(__FILE__, true);

////////////////////////////////////////////////////////////
// 404 - page not found template

get_header(); ?>
    <main>
        <?php get_template_part( 'content', 'none' ); ?>
    </main><?php

get_footer(); ?>
