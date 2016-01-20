<?php wp_template(__FILE__, true);

////////////////////////////////////////////////////////////
// index.php - default page template

get_header(); ?>

    <main>
        <header class="page_header">
            <?php the_archive_title( '<h1 class="page_title">', '</h1>' ); ?>
        </header>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
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
