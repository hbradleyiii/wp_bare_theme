<?php wp_theme_debug(__FILE__);

/**
 * Search page content template
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="page-header">
        <h2 class="page-title">Search Results for: <?php echo get_search_query(); ?></h2>
    </header>

    <div class="page-content">
        <?php while ( have_posts() ) : the_post();
            the_title( '<h3 class="title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>' );
            the_excerpt(); ?>
        <?php endwhile; ?>
    </div>

    <footer class="page-footer">
        <?php edit_post_link( 'Edit', '<span class="edit-link">', '</span>' ); ?>
    </footer>
</article>
