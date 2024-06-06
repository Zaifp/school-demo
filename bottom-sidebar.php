<?php
/**
 * The template for displaying the bottom sidebar
 *
 * @package Your_Theme_Name
 */
?>

<aside id="secondary" class="widget-area">
    <section id="search" class="widget widget_search">
        <?php get_search_form(); ?>
    </section>

    <section id="recent-posts" class="widget widget_recent_entries">
        <h2 class="widget-title"><?php esc_html_e('Recent Posts', 'your-text-domain'); ?></h2>
        <ul>
            <?php
            $recent_posts = wp_get_recent_posts(array(
                'numberposts' => 3, // Change this number to display more posts
                'post_status' => 'publish'
            ));
            foreach($recent_posts as $post) :
            ?>
                <li>
                    <a href="<?php echo get_permalink($post['ID']); ?>">
                        <?php echo esc_html($post['post_title']); ?>
                    </a>
                </li>
            <?php endforeach; wp_reset_query(); ?>
        </ul>
    </section>

    <section id="calendar" class="widget widget_calendar">
        <?php get_calendar(); ?>
    </section>

    <section id="categories" class="widget widget_categories">
        <h2 class="widget-title"><?php esc_html_e('Categories', 'your-text-domain'); ?></h2>
        <ul>
            <?php wp_list_categories(array(
                'title_li' => ''
            )); ?>
        </ul>
    </section>
</aside><!-- #secondary -->
