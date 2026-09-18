<?php
/**
 * Template Name: page
 * Шаблон обычной страницы (О нас, Услуги, Контакты)
 */
get_header();
?>

<main class="site-main">
    <?php while ( have_posts() ) : the_post(); ?>
        <article class="page-content container">
            <header class="page-header">
                <h1 class="page-title"><?php the_title(); ?></h1>
            </header>

            <div class="entry-content">
                <?php the_content(); ?>
            </div>
        </article>
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>