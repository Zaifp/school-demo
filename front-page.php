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
    ?>

    <section class="home-intro">
        <h1><?php the_field('intro_heading'); ?></h1>
        <p><?php the_field('intro_content'); ?></p>
        <?php
        $intro_image = get_field('intro_image');
        if ($intro_image) :
        ?>
            <img src="<?php echo esc_url($intro_image['url']); ?>" alt="<?php echo esc_attr($intro_image['alt']); ?>">
        <?php endif; ?>
    </section>
    
    <section class="home-left">
        <h2><?php the_field('left_section_heading'); ?></h2>
        <p><?php the_field('left_section_content'); ?></p>
    </section>
    
    <section class="home-right">
        <h2><?php the_field('right_section_heading'); ?></h2>
        <p><?php the_field('right_section_content'); ?></p>
    </section>
    
    <section class="home-big-image">
        <?php
        $home_big_image = get_field('home_big_image');
        if ($home_big_image) :
        ?>
            <img src="<?php echo esc_url($home_big_image['url']); ?>" alt="<?php echo esc_attr($home_big_image['alt']); ?>">
        <?php endif; ?>
    </section>
    
    <section class="home-content">
        <p><?php the_field('home_content'); ?></p>
    </section>

    <section class="home-blog">
        <h2><?php esc_html_e('Latest Blog Posts', 'fwd'); ?></h2> 
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
                    <?php the_post_thumbnail( 'thumbnail' ); ?>
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

    <?php
    endwhile; // End of the loop.
    ?>
</main><!-- #primary -->

<?php
get_footer();
