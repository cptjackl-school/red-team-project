<?php
/**
 * Template Name: Starter - Checkout Page
 * Template Post Type: page
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>
<main class="rr-page-template rr-page-template--checkout-starter">
    <section class="rr-starter-section rr-starter-section--hero">
        <h1><?php esc_html_e('Checkout Starter', 'retro-restoration'); ?></h1>
        <p><?php esc_html_e('Starter structure for checkout flow updates.', 'retro-restoration'); ?></p>
    </section>

    <section class="rr-starter-section rr-starter-section--content">
        <h2><?php esc_html_e('To Build', 'retro-restoration'); ?></h2>
        <ul>
            <li><?php esc_html_e('Step-by-step checkout layout', 'retro-restoration'); ?></li>
            <li><?php esc_html_e('Billing and shipping form styling', 'retro-restoration'); ?></li>
            <li><?php esc_html_e('Order summary and trust messaging', 'retro-restoration'); ?></li>
        </ul>

        <?php if (shortcode_exists('woocommerce_checkout')) : ?>
            <?php echo do_shortcode('[woocommerce_checkout]'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
        <?php else : ?>
            <p><?php esc_html_e('WooCommerce checkout shortcode is unavailable. Add placeholder checkout UI here.', 'retro-restoration'); ?></p>
        <?php endif; ?>
    </section>
</main>
<?php get_footer();
