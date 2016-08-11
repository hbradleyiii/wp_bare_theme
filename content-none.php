<?php wp_theme_debug(__FILE__);

////////////////////////////////////////////////////////////
// content-none.php - template for displaying results in none pages

?>
<article>
    <header class="page_header">
        <?php if ( is_search() ) : ?>
            <h1 class="page_title">No Results found for: <?php echo get_search_query(); ?></h2>
        <?php else : ?>
            <h1 class="page_title">Not Found<h1>
        <?php endif; ?>
    </header>

    <div class="page_content">
        <?php if ( is_search() ) : ?>
            <p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>
        <?php else : ?>
            <p>Page not found.</p>
        <?php endif; ?>
    </div>
</article>
