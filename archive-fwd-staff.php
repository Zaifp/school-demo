<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package schoolz
 */

get_header();
add_filter( 'get_the_archive_title_prefix', '__return_false' );
?>

<main id="primary" class="site-main">

    <?php if ( have_posts() ) : ?>

        <header class="page-header">
            <?php
            the_archive_title( '<h1 class="page-title">', '</h1>' );
            the_archive_description( '<div class="archive-description">', '</div>' );
            ?>
        </header><!-- .page-header -->

        <div class="staff-archive-container">
            <section class="staff-section">
                <h2><?php esc_html_e( 'Administrative', 'fwd' ); ?></h2>
                <?php
                $args = array(
                    'post_type'      => 'fwd-staff',
                    'posts_per_page' => -1,
                    'tax_query'      => array(
                        array(
                            'taxonomy' => 'fwd-staff-category',
                            'field'    => 'slug',
                            'terms'    => 'administrative'
                        )
                    )
                );
                $query = new WP_Query( $args );

                if ( $query->have_posts() ) {
                    while ( $query->have_posts() ) {
                        $query->the_post();
                        ?>
                        <article class="staff-item">
                            <a href="<?php the_permalink(); ?>">
                                <h3><?php the_title(); ?></h3>
                                <div class="staff-thumbnail">
                                    <?php the_post_thumbnail('large'); ?>
                                </div>
                            </a>
                            <div class="staff-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                        </article>
                        <?php
                    }
                    wp_reset_postdata();
                } else {
                    echo '<p>' . __( 'No administrative staff found.', 'fwd' ) . '</p>';
                }
                ?>
            </section>

            <section class="staff-section">
                <h2><?php esc_html_e( 'Faculty', 'fwd' ); ?></h2>
                <?php
                $args = array(
                    'post_type'      => 'fwd-staff',
                    'posts_per_page' => -1,
                    'tax_query'      => array(
                        array(
                            'taxonomy' => 'fwd-staff-category',
                            'field'    => 'slug',
                            'terms'    => 'faculty'
                        )
                    )
                );
                $query = new WP_Query( $args );

                if ( $query->have_posts() ) {
                    while ( $query->have_posts() ) {
                        $query->the_post();
                        ?>
                        <article class="staff-item">
                            <a href="<?php the_permalink(); ?>">
                                <h3><?php the_title(); ?></h3>
                                <div class="staff-thumbnail">
                                    <?php the_post_thumbnail('large'); ?>
                                </div>
                            </a>
                            <div class="staff-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                            <div class="website">
                                <?php $website_url = get_field('website_url'); ?>
                                <?php if ( $website_url ) : ?>
                                    <a href="<?php echo esc_url( $website_url ); ?>" target="_blank">Instructor's Website</a>
                                <?php endif; ?>
                            </div>
                        </article>
                        <?php
                    }
                    wp_reset_postdata();
                } else {
                    echo '<p>' . __( 'No faculty found.', 'fwd' ) . '</p>';
                }
                ?>
            </section>
        </div><!-- .staff-archive-container -->

    <?php else : ?>

        <?php get_template_part( 'template-parts/content', 'none' ); ?>

    <?php endif; ?>

</main><!-- #primary -->

<?php
get_footer();
