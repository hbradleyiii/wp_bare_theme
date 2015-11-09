<?php wp_template(__FILE__, true);

////////////////////////////////////////////////////////////
// single.php - default single post template

get_header(); ?>

    <main>
    <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'content', get_post_format() ); ?>

    <?php endwhile; 
        the_posts_pagination( array(
            'prev_text'          => 'Previous page',
            'next_text'          => 'Next page',
            'before_page_number' => '<span class="meta-nav screen-reader-text">' . 'Page' . ' </span>',
        ) );?>
    </main>

<?php get_footer(); ?>

