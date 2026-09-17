<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card' ); ?>>
    <?php if ( has_post_thumbnail() ) : ?>
        <a href="<?php the_permalink(); ?>" class="post-thumb">
            <?php the_post_thumbnail( 'mytheme-card', [ 'loading' => 'lazy' ] ); ?>
        </a>
    <?php endif; ?>

    <header class="entry-header">
        <h2 class="entry-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>
        <time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>">
            <?php echo esc_html( get_the_date() ); ?>
        </time>
    </header>

    <div class="entry-excerpt">
        <?php the_excerpt(); ?>
    </div>
</article>