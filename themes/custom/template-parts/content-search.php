<article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>

    <?php if (has_post_thumbnail()) : ?>
        <a href="<?php the_permalink(); ?>" class="post-card__thumb">
            <?php the_post_thumbnail('medium', ['loading' => 'lazy']); ?>
        </a>
    <?php endif; ?>

    <header class="post-card__header">
        <h2 class="post-card__title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>
    </header>

    <div class="post-card__excerpt">
        <?php the_excerpt(); ?>
    </div>

    <footer class="post-card__footer">
        <time datetime="<?php echo esc_attr(get_the_date(DATE_W3C)); ?>">
            <?php echo esc_html(get_the_date()); ?>
        </time>
        <a href="<?php the_permalink(); ?>" class="post-card__link">Читать →</a>
    </footer>

</article>