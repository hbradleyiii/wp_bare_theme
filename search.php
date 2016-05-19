<?php wp_template(__FILE__, true);

////////////////////////////////////////////////////////////
// search.php - default search display

get_header(); ?>
    <main>
        <?php if ( have_posts() ) :
            get_template_part( 'content', 'search' );
            the_posts_pagination( array(
                'prev_text'          => 'Previous page',
                'next_text'          => 'Next page',
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . 'Page' . ' </span>',
            ) );
        else : // No content found
            get_template_part( 'content', 'none' );
        endif; ?>
    </main><?php

get_footer(); ?>
