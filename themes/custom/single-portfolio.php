<?php
/**
 * Шаблон одиночного кейса портфолио.
 *
 * @package custom
 */

get_header();
?>

<article class="single-portfolio container section">

    <?php while ( have_posts() ) : the_post(); ?>

        <?php
        $client   = get_field( 'portfolio_client' );
        $url      = get_field( 'portfolio_url' );
        $tasks    = get_field( 'portfolio_tasks' );
        $result   = get_field( 'portfolio_result' );
        $cover    = get_field( 'portfolio_cover' );
        $terms    = get_the_terms( get_the_ID(), 'portfolio_type' );
        ?>

        <header class="single-portfolio__header">
            <?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) : ?>
                <span class="work__tag"><?php echo esc_html( $terms[0]->name ); ?></span>
            <?php endif; ?>

            <h1 class="single-portfolio__title"><?php the_title(); ?></h1>

            <?php if ( $client ) : ?>
                <p class="single-portfolio__client">Клиент: <strong><?php echo esc_html( $client ); ?></strong></p>
            <?php endif; ?>
        </header>

        <?php if ( $cover && is_array( $cover ) ) : ?>
            <div class="single-portfolio__cover">
                <img src="<?php echo esc_url( $cover['sizes']['large'] ?? $cover['url'] ); ?>"
                     alt="<?php echo esc_attr( $cover['alt'] ?: get_the_title() ); ?>"
                     loading="eager"
                     width="<?php echo esc_attr( $cover['sizes']['large-width'] ?? '' ); ?>"
                     height="<?php echo esc_attr( $cover['sizes']['large-height'] ?? '' ); ?>">
            </div>
        <?php endif; ?>

        <?php if ( get_the_content() ) : ?>
            <div class="single-portfolio__content">
                <?php the_content(); ?>
            </div>
        <?php endif; ?>

        <?php if ( $tasks ) : ?>
            <section class="single-portfolio__section">
                <h2 class="section__title">Что сделали</h2>
                <div class="single-portfolio__tasks"><?php echo wp_kses_post( $tasks ); ?></div>
            </section>
        <?php endif; ?>

        <?php if ( $result ) : ?>
            <section class="single-portfolio__section single-portfolio__section--result">
                <h2 class="section__title">Результат</h2>
                <p><?php echo esc_html( $result ); ?></p>
            </section>
        <?php endif; ?>

        <?php if ( $url ) : ?>
            <div class="single-portfolio__cta">
                <a href="<?php echo esc_url( $url ); ?>"
                   class="btn btn--primary btn--lg"
                   target="_blank"
                   rel="noopener nofollow">
                    Открыть сайт →
                </a>
            </div>
        <?php endif; ?>

    <?php endwhile; ?>

    <div class="single-portfolio__back">
        <a href="<?php echo esc_url( get_permalink( 40 ) ); ?>" class="btn btn--outline">
            ← Все работы
        </a>
    </div>

</article>

<?php
get_footer();