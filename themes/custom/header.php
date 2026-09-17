<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#content">
    <?php esc_html_e( 'Перейти к содержимому', 'mytheme' ); ?>
</a>

<header class="site-header">
    <div class="container">
        <div class="site-branding">
            <?php if ( has_custom_logo() ) : the_custom_logo(); else : ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <?php bloginfo( 'name' ); ?>
                </a>
            <?php endif; ?>
        </div>

        <nav class="main-nav" aria-label="<?php esc_attr_e( 'Главное меню', 'mytheme' ); ?>">
            <?php
            wp_nav_menu( [
                'theme_location' => 'primary',
                'container'      => false,
                'fallback_cb'    => false,
                'depth'          => 2,
            ] );
            ?>
        </nav>
    </div>
</header>

<main id="content" class="site-content">