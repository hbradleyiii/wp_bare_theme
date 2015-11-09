<?php wp_template(__FILE__, false);

////////////////////////////////////////////////////////////
// content-search.php - template for displaying results in search pages

?>
<section>
    <header class="page_header">
        <h1 class="page_header">
    </header>

    <div class="page_content">


        <?php if ( is_search() ) : ?>

            <p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>

        <?php else : ?>

            <p>Page not found.</p>

        <?php endif; ?>

    </div>

</section>
