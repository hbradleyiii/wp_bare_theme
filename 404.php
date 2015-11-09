<?php wp_template(__FILE__, true);

////////////////////////////////////////////////////////////
// 404 - page not found template

get_header(); ?>

    <main>
        <article>
            <h1>Page Not Found</h1>
            <p>The page you requested could not be found.</p>
        </article>
        <?php get_sidebar(); ?>
    </main>

<?php get_footer(); ?>
