<?php

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>
<main class="rr-page-template rr-page-template--cart">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <section class="rr-starter-section rr-starter-section--hero">
                <h1><?php the_title(); ?></h1>
                <p><?php esc_html_e('Review items before checkout.', 'retro-restoration'); ?></p>
            </section>

            <section class="rr-starter-section rr-starter-section--content rr-cart-shell">
                <?php if (shortcode_exists('woocommerce_cart')) : ?>
                    <?php echo do_shortcode('[woocommerce_cart]'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                <?php else : ?>
                    <p><?php esc_html_e('WooCommerce cart shortcode is unavailable. Activate WooCommerce to display the cart.', 'retro-restoration'); ?></p>
                <?php endif; ?>
            </section>
        <?php endwhile; ?>
    <?php endif; ?>
</main>
<?php get_footer();
