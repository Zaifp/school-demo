<?php
/**
 * Template Name: Student List
 * The template for displaying a list of students.
 *
 * @package schoolz
 */

get_header();
add_filter( 'get_the_archive_title_prefix', '__return_false' );

// Modify the excerpt length and read more text for this template
function custom_student_excerpt_length( $length ) {
    return 25;
}
add_filter( 'excerpt_length', 'custom_student_excerpt_length', 999 );

function custom_student_excerpt_more( $more ) {
    global $post;
    return '... <a class="read-more" href="' . get_permalink( $post->ID ) . '">' . __('Read More about the Student', 'your-text-domain') . '</a>';
}
add_filter( 'excerpt_more', 'custom_student_excerpt_more' );

?>

<main id="primary" class="site-main">
    <?php
    the_archive_title( '<h1 class="page-title">', '</h1>' );
    the_archive_description( '<div class="archive-description">', '</div>' );
    ?>

    <div class="students-grid">
        <?php
        $args = array(
            'post_type'      => 'fwd-student',
            'posts_per_page' => -1,
            'orderby'        => 'title',
            'order'          => 'ASC',
        );

        $students_query = new WP_Query( $args );

        if ( $students_query->have_posts() ) :
            while ( $students_query->have_posts() ) : $students_query->the_post();
                $terms = get_the_terms( get_the_ID(), 'fwd-student-category' );
        ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="student-thumbnail">
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large' ); ?></a>
                        </div>
                    <?php endif; ?>
                    <div class="student-excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                    <div class="student-terms">
                        <?php if ( $terms && ! is_wp_error( $terms ) ) : ?>
                            <ul class="student-terms-list">
                                <?php foreach ( $terms as $term ) : ?>
                                    <li><a href="<?php echo esc_url( get_term_link( $term ) ); ?>"><?php echo esc_html( $term->name ); ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </article>
        <?php
            endwhile;
            wp_reset_postdata();
        else :
            echo '<p>' . __( 'No students found.', 'your-text-domain' ) . '</p>';
        endif;
        ?>
    </div>
</main><!-- #primary -->

<?php
// Remove filters to prevent affecting other parts of the site
remove_filter( 'excerpt_length', 'custom_student_excerpt_length', 999 );
remove_filter( 'excerpt_more', 'custom_student_excerpt_more' );

get_footer();
?>
