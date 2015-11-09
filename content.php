<?php wp_template(__FILE__, false);

////////////////////////////////////////////////////////////
// content.php - default template for displaying content

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry_header">
        <?php
            if ( is_single() ) :
                the_title( '<h1>', '</h1>' );
            else :
                the_title( '<h2><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>' );
            endif;
        ?>
    </header>

    <div class="entry_content">
        <?php the_content( 'Continue reading ' . get_the_title() ); ?>
    </div>

    <?php if ( is_single() && get_the_author_meta( 'description' ) ) {
        get_template_part( 'author-bio' );
    } ?>

    <footer class="entry-footer">
        <?php edit_post_link( 'Edit', '<span class="edit-link">', '</span>' ); ?>
    </footer>
</article>
