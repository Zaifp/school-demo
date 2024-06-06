<?php
/**
 * Template Name: News
 * The template for displaying the blog posts on the News page.
 *
 * @package schoolz
 */

get_header();
?>

<main id="primary" class="site-main">
    <section class="news-posts">
        <h1><?php the_title(); ?></h1>
        
        <?php
        $args = array(
            'post_type'      => 'post',
            'posts_per_page' => -1,
            'orderby'        => 'date',
            'order'          => 'DESC',
        );

        $news_query = new WP_Query( $args );

        if ( $news_query->have_posts() ) :
            while ( $news_query->have_posts() ) : $news_query->the_post();
        ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> data-aos="fade-up">
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="post-image">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                    <div class="post-excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                </article>
        <?php
            endwhile;
            wp_reset_postdata();
        else :
            echo '<p>' . __( 'No posts found.', 'your-text-domain' ) . '</p>';
        endif;
        ?>
    </section>
</main><!-- #primary -->

<?php
get_footer();
?>
