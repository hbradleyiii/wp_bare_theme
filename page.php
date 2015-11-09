<?php wp_template(__FILE__, true);

////////////////////////////////////////////////////////////
// page.php - default page template

get_header(); ?>

    <main>
    <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'content', 'page' ); ?>

    <?php endwhile; ?>
    </main>

<?php get_footer(); ?>
