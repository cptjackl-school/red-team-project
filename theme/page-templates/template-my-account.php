<?php
/**
 * Template Name: My Account Page
 * Template Post Type: page
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>
<main class="rr-page-template rr-page-template--account-starter">
    <section class="rr-starter-section rr-starter-section--hero">
        <h1><?php esc_html_e('My Account', 'retro-restoration'); ?></h1>
        <p><?php esc_html_e('Manage your profile, orders, addresses, and account settings from one place.', 'retro-restoration'); ?></p>
    </section>

    <section class="rr-starter-section rr-starter-section--content">
        <?php if (shortcode_exists('woocommerce_my_account')) : ?>
            <div class="rr-account-shell">
                <?php echo do_shortcode('[woocommerce_my_account]'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
            </div>
        <?php else : ?>
            <div class="rr-account-placeholder">
                <h2><?php esc_html_e('Account functionality is not available', 'retro-restoration'); ?></h2>
                <p><?php esc_html_e('WooCommerce is required to display the account dashboard. Install and activate WooCommerce, then set this page as your My Account page.', 'retro-restoration'); ?></p>
            </div>
        <?php endif; ?>
    </section>
</main>
<?php get_footer();
