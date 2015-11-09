<?php wp_template(__FILE__, false);

////////////////////////////////////////////////////////////
// content-search.php - template for displaying results in search pages

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry_header">
        <?php the_title( '<h2><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' ); ?>
    </header>

    <div class="entry_content">
        <?php the_excerpt(); ?>
    </div>

    <footer class="entry-footer">
        <?php edit_post_link( 'Edit', '<span class="edit-link">', '</span>' ); ?>
    </footer>
</article>
