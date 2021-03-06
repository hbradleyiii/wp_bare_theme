<?php wp_theme_debug(__FILE__);

/**
 * Blank (not found) content template
 */

?>
<article>
    <header class="page-header">
        <?php if ( is_search() ) : ?>
            <h1 class="page-title">No Results found for: <?php echo get_search_query(); ?></h2>
        <?php else : ?>
            <h1 class="page-title">Not Found<h1>
        <?php endif; ?>
    </header>

    <div class="page-content">
        <?php if ( is_search() ) : ?>
            <p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>
        <?php else : ?>
            <p>Page not found.</p>
        <?php endif; ?>
    </div>
</article>
