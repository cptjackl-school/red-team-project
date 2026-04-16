<?php

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>
<main class="rr-page-template rr-page-template--checkout">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <section class="rr-starter-section rr-starter-section--hero">
                <h1><?php the_title(); ?></h1>
                <p><?php esc_html_e('Complete your order with secure billing and shipping details.', 'retro-restoration'); ?></p>
            </section>

            <section class="rr-starter-section rr-starter-section--content rr-checkout-content">
                <?php if (shortcode_exists('woocommerce_checkout')) : ?>
                    <?php echo do_shortcode('[woocommerce_checkout]'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                <?php else : ?>
                    <p><?php esc_html_e('WooCommerce checkout is unavailable. Activate WooCommerce to display the checkout form.', 'retro-restoration'); ?></p>
                <?php endif; ?>
            </section>
        <?php endwhile; ?>
    <?php endif; ?>
</main>
<?php get_footer();
