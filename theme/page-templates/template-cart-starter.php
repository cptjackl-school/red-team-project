<?php
/**
 * Template Name: Starter - Cart Page
 * Template Post Type: page
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>
<main class="rr-page-template rr-page-template--cart-starter">
    <section class="rr-starter-section rr-starter-section--hero">
        <h1><?php esc_html_e('Cart Starter', 'retro-restoration'); ?></h1>
        <p><?php esc_html_e('Starter layout for cart redesign and cart-side messaging.', 'retro-restoration'); ?></p>
    </section>

    <section class="rr-starter-section rr-starter-section--content">
        <h2><?php esc_html_e('To Build', 'retro-restoration'); ?></h2>
        <ul>
            <li><?php esc_html_e('Cart table design updates', 'retro-restoration'); ?></li>
            <li><?php esc_html_e('Cross-sells and recommendations', 'retro-restoration'); ?></li>
            <li><?php esc_html_e('Shipping and promo code UX', 'retro-restoration'); ?></li>
        </ul>

        <?php if (shortcode_exists('woocommerce_cart')) : ?>
            <?php echo do_shortcode('[woocommerce_cart]'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
        <?php else : ?>
            <p><?php esc_html_e('WooCommerce cart shortcode is unavailable. Add placeholder cart UI here.', 'retro-restoration'); ?></p>
        <?php endif; ?>
    </section>
</main>
<?php get_footer();
