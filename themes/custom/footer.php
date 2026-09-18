</main>

<!-- ================= FOOTER ================= -->
<footer class="footer">
    <div class="container footer__inner">
        <div class="footer__col">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="footer__logo"><?php bloginfo('name'); ?></a>
            <p class="footer__text"><?php bloginfo('description'); ?></p>
        </div>

        <nav class="footer__col" aria-label="Навигация в футере">
            <h3 class="footer__title">Навигация</h3>
            <?php
            wp_nav_menu([
                'theme_location' => 'footer',
                'container'      => false,
                'menu_class'     => 'footer__list',
                'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
                'fallback_cb'    => false,
                'depth'          => 1,
            ]);
            ?>
        </nav>

        <div class="footer__col">
            <h3 class="footer__title">Контакты</h3>
            <address class="footer__address">
                <p>г. Гродно, ул. Примерная, 1</p>
                <p><a href="tel:+375151234567">+375 15 123-45-67</a></p>
                <p><a href="mailto:hello@вашдомен.by">hello@вашдомен.by</a></p>
            </address>
            <p class="footer__social">
                <a href="#" rel="noopener">Google Business</a> ·
                <a href="#" rel="noopener">Яндекс Бизнес</a>
            </p>
        </div>
    </div>

    <div class="footer__bottom">
        <div class="container">
            <p>© <?php echo esc_html(date_i18n('Y')); ?> <?php bloginfo('name'); ?>. Все права защищены.</p>
        </div>
    </div>
</footer>

<?php // SVG-спрайт — см. пункт 9 
?>
<?php get_template_part('template-parts/svg-sprite'); ?>

<?php wp_footer(); ?>
</body>

</html>