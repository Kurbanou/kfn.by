</main><!-- #content -->

<footer class="site-footer">
    <div class="container">
        <nav class="footer-nav">
            <?php
            wp_nav_menu( [
                'theme_location' => 'footer',
                'container'      => false,
                'fallback_cb'    => false,
                'depth'          => 1,
            ] );
            ?>
        </nav>
        <p class="copyright">
            &copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?>
            <?php bloginfo( 'name' ); ?>
        </p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>