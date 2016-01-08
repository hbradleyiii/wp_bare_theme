<?php wp_template(__FILE__, true);

////////////////////////////////////////////////////////////
// search.php - default search display

get_header(); ?>

    <main>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'content', 'search' ); ?>
        <?php endwhile;
        the_posts_pagination( array(
            'prev_text'          => 'Previous page',
            'next_text'          => 'Next page',
            'before_page_number' => '<span class="meta-nav screen-reader-text">' . 'Page' . ' </span>',
        ) );
        else : // No content found
            get_template_part( 'content', 'none' );
        endif; ?>
    </main>

<?php get_footer(); ?>
