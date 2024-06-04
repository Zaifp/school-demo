<?php
/*
Template Name: News
*/

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

    <?php
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => -1 // Fetch all posts
    );
    $news_query = new WP_Query($args);

    if ($news_query->have_posts()) : 
        while ($news_query->have_posts()) : $news_query->the_post();
            // Output the title and the excerpt for each post
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                </header>

                <div class="entry-summary">
                    <?php the_excerpt(); ?>
                </div>
            </article>
            <?php
        endwhile;
        wp_reset_postdata();
    else :
        get_template_part('template-parts/content', 'none');
    endif;
    ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
