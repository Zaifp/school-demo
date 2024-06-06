<?php
/**
 * The template for displaying the home page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FWD_Starter_Theme
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    while ( have_posts() ) :
        the_post();
        the_content();
    endwhile; // End of the loop.
    ?>

    <h2><?php esc_html_e('Recent News', 'fwd'); ?></h2>

    <section class="home-blog">
       
        <?php
        $args = array( 
            'post_type'      => 'post',
            'posts_per_page' => 4 
        );
        $blog_query = new WP_Query( $args );
        if ( $blog_query->have_posts() ) {
            while ( $blog_query->have_posts() ) {
                $blog_query->the_post();
        ?>
            <article>
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail( 'medium' ); ?>
                    <h3><?php the_title(); ?></h3>
                    <p><?php echo get_the_date(); ?></p>
                </a>
            </article>
        <?php
            }
            wp_reset_postdata();
        }
        ?>
    </section>
</main><!-- #primary -->

<?php
get_footer();
?>
