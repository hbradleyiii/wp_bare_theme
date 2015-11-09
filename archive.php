<?php wp_template(__FILE__, true);

////////////////////////////////////////////////////////////
// archive.php - default archive template

get_header(); ?>

    <main>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <header class="page_header">
            <?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
        </header>

        <?php get_template_part( 'content', get_post_format() ); ?>

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
