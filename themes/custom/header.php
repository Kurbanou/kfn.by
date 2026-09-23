<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <!-- ================= HEADER ================= -->
    <header class="header">
        <div class="container header__inner">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="header__logo" aria-label="<?php bloginfo('name'); ?> — на главную">
                <svg class="header__logo-icon" width="32" height="32" aria-hidden="true">
                    <use href="#icon-logo"></use>
                </svg>
                <span class="header__logo-text"><?php bloginfo('name'); ?></span>
            </a>

            <button class="header__burger" aria-label="Открыть меню" aria-expanded="false">
                <span></span><span></span><span></span>
            </button>

            <nav class="header__nav nav" aria-label="Основная навигация">
                <?php
                wp_nav_menu([
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'nav__list',
                    'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
                    'fallback_cb'    => false,
                    'depth'          => 1,
                ]);
                ?>
                <a href="#form" class="btn btn--primary nav__cta">Получить КП</a>
            </nav>
        </div>
    </header>

    <main class="site-main">            
        <?php if ( function_exists( 'rank_math_the_breadcrumbs' ) && ! is_front_page() ) : ?>
            <div class="container">
                <div class="breadcrumbs-wrapper">
                    <?php rank_math_the_breadcrumbs(); ?>
                </div>
            </div>
        <?php endif; ?>