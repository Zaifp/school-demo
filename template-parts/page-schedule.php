<?php
/**
 * Template Name: Schedule
 * The template for displaying the schedule page.
 *
 * @package schoolz
 */

get_header();
?>

<div class="no-sidebar-layout">
  <main id="primary" class="site-main content-wrapper">
    <?php
    while ( have_posts() ) :
        the_post();
    ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>
      </header><!-- .entry-header -->

      <div class="entry-content">
        <p><?php the_content(); ?></p>
        <?php if ( have_rows('weekly_course_schedule') ) : ?>
          <h2>Weekly Course Schedule</h2>
          <table>
            <thead>
              <tr>
                <th>Date</th>
                <th>Course</th>
                <th>Instructor</th>
              </tr>
            </thead>
            <tbody>
              <?php while ( have_rows('weekly_course_schedule') ) : the_row(); ?>
                <tr>
                  <td><?php the_sub_field('date'); ?></td>
                  <td><?php the_sub_field('course'); ?></td>
                  <td><?php the_sub_field('instructor'); ?></td>
                </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        <?php else : ?>
          <p>No course schedule found.</p>
        <?php endif; ?>
      </div><!-- .entry-content -->

    </article><!-- #post-<?php the_ID(); ?> -->

    <?php
    endwhile; // End of the loop.
    ?>
  </main><!-- #primary -->
</div>

<?php
get_footer();
?>
