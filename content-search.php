<?php wp_template(__FILE__, false);

////////////////////////////////////////////////////////////
// content-search.php - template for displaying results in search pages

?>
<article id="post_<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="page_header">
        <?php the_title( '<h2><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?>
    </header>

    <div class="page_content">
        <?php the_excerpt(); ?>
    </div>

    <footer class="page_footer">
        <?php edit_post_link( 'Edit', '<span class="edit-link">', '</span>' ); ?>
    </footer>
</article>
