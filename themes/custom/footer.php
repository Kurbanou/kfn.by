</main>

<!-- ================= FOOTER ================= -->
<footer class="footer">
    <div class="container footer__inner">
        <div class="footer__col">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="footer__logo"><?php bloginfo('name'); ?></a>
            <p class="footer__text"><?php bloginfo('description'); ?></p>
            <p><a class="footer__text" href="/privacy-policy/">Политика конфиденциальности</a></p>

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
                <p>г. Гродно · работаем по всей Беларуси</p>
                <p><a href="tel:+375298885419">+375 29 888-54-19</a></p>
                <p><a href="mailto:kurbanou.faridun@gmail.com">kurbanou.faridun@gmail.com</a></p>

            </address>
            <?php /* Ссылки на бизнес-профили — раскомментировать после создания
            <p class="footer__social">
                <a href="URL_GOOGLE" target="_blank" rel="noopener">Google Business</a> ·
                <a href="URL_YANDEX" target="_blank" rel="noopener">Яндекс Бизнес</a>
            </p>
            */ ?>
        </div>
    </div>

    <div class="footer__bottom">
        <div class="container">
            <p>© <?php echo esc_html(date_i18n('Y')); ?> <?php bloginfo('name'); ?>. Все права защищены.</p>
        </div>
        <!-- Cookie Settings Link (в футере) -->
        <p class="cookie-settings-link">
            <a href="#" id="cookie-settings">Настройки cookie</a>
        </p>
    </div>
</footer>

<?php // SVG-спрайт — см. пункт 9 
?>
<?php get_template_part('template-parts/svg-sprite'); ?>

<!-- Cookie Banner -->
<div class="cookie-banner" id="cookie-banner" hidden>
    <div class="cookie-banner__inner">
        <p class="cookie-banner__text">
            Мы используем файлы cookie для аналитики и улучшения работы сайта.
            Подробнее — в <a href="/privacy-policy/" target="_blank" rel="noopener">политике конфиденциальности</a>.
        </p>
        <div class="cookie-banner__actions">
            <button type="button" class="btn btn--primary btn--sm" id="cookie-accept">Принять</button>
            <button type="button" class="btn btn--outline btn--sm" id="cookie-decline">Отклонить</button>
        </div>
    </div>
</div>



<?php wp_footer(); ?>
</body>

</html>