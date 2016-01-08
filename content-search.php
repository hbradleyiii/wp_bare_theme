<?php wp_template(__FILE__, false);

////////////////////////////////////////////////////////////
// content-search.php - template for displaying results in search pages

?>
<article id="post_<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="page_header">
        <h2 class="page_title">Search Results for: <?php echo get_search_query(); ?></h2>
    </header>

    <div class="page_content">
        <?php while ( have_posts() ) : the_post();
            the_title( '<h3 class="title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>' );
            the_excerpt(); ?>
        <?php endwhile; ?>
    </div>

    <footer class="page_footer">
        <?php edit_post_link( 'Edit', '<span class="edit-link">', '</span>' ); ?>
    </footer>
</article>
