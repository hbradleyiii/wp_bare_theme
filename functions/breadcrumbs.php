<?php wp_template(__FILE__, true);

////////////////////////////////////////////////////////////
// functions/breadcrumbs.php - breadcrumbs function

function the_breadcrumbs() {
    global $post; ?>
                <span class="breadcrumbs">
                    <a href="<?php echo get_site_url(); ?>">Home</a>
                    <?php if ( $post->post_parent ): ?>
                        <?php $parent = $post->post_parent; ?>
                        <?php if ( get_post($parent)->post_parent ): ?>
                            <?php $grandparent = get_post($parent)->post_parent; ?>
                    <a href="<?php echo get_permalink( get_post($grandparent) ); ?>" ><?php echo get_the_title( $grandparent ); ?></a>
                        <?php endif; ?>
                    <a href="<?php echo get_permalink( $parent ); ?>" ><?php echo get_the_title( $parent ); ?></a>
                    <?php endif; ?>
                    <span><?php the_title(); ?></span>
                </span>
<?php } ?>
