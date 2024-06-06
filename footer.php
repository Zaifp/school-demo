<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package schoolz
 */
?>

    <footer id="colophon" class="site-footer">
        <div class="footer-container">
            <div class="footer-menu">
                <h3><?php esc_html_e('Links', 'schoolz'); ?></h3>
                <nav>
                    <?php wp_nav_menu( array( 'theme_location' => 'footer-menu', ) ); ?>
                </nav>
            </div>
            <div class="site-info">
                <?php esc_html_e( 'Created by ', 'fwd' ); ?>
                <?php esc_html_e( 'Zaif & Mudarres', 'fwd' ); ?>
            </div><!-- .site-info -->
            <div class="footer-contact">
                <div class="footer-icon">
                    <?php get_template_part( 'images/icon-school' ); ?>
                </div>
                <?php get_template_part( 'images/scroll' ); ?>
            </div>
        </div>
    </footer><!-- #colophon -->
</div><!-- #page -->

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<?php wp_footer(); ?>

</body>
</html>
