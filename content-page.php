<?php wp_theme_debug(__FILE__);

/**
 * Page content template
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="page-header">
        <?php the_title( '<h2><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?>
    </header>

    <div class="page-content">
        <?php the_content(); ?>
    </div>

    <footer class="page-footer">
        <?php edit_post_link( 'Edit', '<span class="edit-link">', '</span>' ); ?>
    </footer>
</article>
