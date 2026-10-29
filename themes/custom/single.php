<?php

/**
 * Шаблон отдельной записи блога
 */
get_header();
?>

<?php while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('post-full container '); ?>>

        <header class="post-header">
            <h1 class="post-title"><?php the_title(); ?></h1>

            <div class="post-meta">
                <time class="post-date" datetime="<?php echo esc_attr(get_the_date(DATE_W3C)); ?>">
                    <?php echo esc_html(get_the_date()); ?>
                </time>

                <?php
                $categories = get_the_category();
                if ($categories) : ?>
                    <span class="post-categories">
                        <?php the_category(', '); ?>
                    </span>
                <?php endif; ?>

                <span class="post-author">
                    <?php echo esc_html(get_the_author()); ?>
                </span>
            </div>
        </header>

        <?php if (has_post_thumbnail()) : ?>
            <div class="post-thumbnail">
                <?php the_post_thumbnail('large', ['loading' => 'eager']); ?>
            </div>
        <?php endif; ?>

        <div class="entry-content">
            <?php the_content(); ?>
        </div>



        <div class="post-navigation">
            <?php
            the_post_navigation([
                'prev_text' => '<span class="post-nav__label">← Предыдущая</span><span class="post-nav__title">%title</span>',
                'next_text' => '<span class="post-nav__label">Следующая →</span><span class="post-nav__title">%title</span>',
            ]);
            ?>
        </div>


        <?php
        // Похожие статьи (3 шт из той же категории)
        $related = new WP_Query([
            'post_type'      => 'post',
            'posts_per_page' => 3,
            'post__not_in'   => [get_the_ID()],
            'category__in'   => wp_get_post_categories(get_the_ID()),
        ]);

        if ($related->have_posts()) : ?>
            <section class="related-posts">
                <h2 class="related-posts__title">Похожие статьи</h2>
                <div class="posts-grid">
                    <?php while ($related->have_posts()) : $related->the_post(); ?>
                        <article class="post-card">
                            <a href="<?php the_permalink(); ?>" class="post-card__link">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="post-card__thumb">
                                        <?php the_post_thumbnail('medium_large', ['loading' => 'lazy']); ?>
                                    </div>
                                <?php else : ?>
                                    <div class="post-card__thumb post-card__thumb--placeholder"></div>
                                <?php endif; ?>
                                <div class="post-card__body">
                                    <?php
                                    $categories = get_the_category();
                                    if ($categories) : ?>
                                        <span class="post-card__category"><?php echo esc_html($categories[0]->name); ?></span>
                                    <?php endif; ?>
                                    <h3 class="post-card__title"><?php the_title(); ?></h3>
                                    <time class="post-card__meta" datetime="<?php echo esc_attr(get_the_date(DATE_W3C)); ?>">
                                        <?php echo esc_html(get_the_date()); ?>
                                    </time>
                                </div>
                            </a>
                        </article>
                    <?php endwhile; ?>
                </div>
            </section>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>



    </article>
<?php endwhile; ?>

<?php get_footer(); ?>