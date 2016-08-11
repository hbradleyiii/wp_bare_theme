<?php wp_theme_debug(__FILE__, false);

////////////////////////////////////////////////////////////
// content-page.php - template for displaying content of pages

?>
<article id="post_<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="page_header">
        <?php the_title( '<h2><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?>
    </header>

    <div class="page_content">
        <?php the_content(); ?>
    </div>

    <footer class="page_footer">
        <?php edit_post_link( 'Edit', '<span class="edit-link">', '</span>' ); ?>
    </footer>
</article>
