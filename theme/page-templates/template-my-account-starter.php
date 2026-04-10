<?php
/**
 * Template Name: Starter - My Account Page
 * Template Post Type: page
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>
<main class="rr-page-template rr-page-template--account-starter">
    <section class="rr-starter-section rr-starter-section--hero">
        <h1><?php esc_html_e('My Account Starter', 'retro-restoration'); ?></h1>
        <p><?php esc_html_e('Starter layout for account dashboard improvements.', 'retro-restoration'); ?></p>
    </section>

    <section class="rr-starter-section rr-starter-section--content">
        <h2><?php esc_html_e('To Build', 'retro-restoration'); ?></h2>
        <ul>
            <li><?php esc_html_e('Account navigation styling', 'retro-restoration'); ?></li>
            <li><?php esc_html_e('Orders, addresses, and profile sections', 'retro-restoration'); ?></li>
            <li><?php esc_html_e('Support links and account help content', 'retro-restoration'); ?></li>
        </ul>

        <?php if (shortcode_exists('woocommerce_my_account')) : ?>
            <?php echo do_shortcode('[woocommerce_my_account]'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
        <?php else : ?>
            <p><?php esc_html_e('WooCommerce account shortcode is unavailable. Add placeholder account UI here.', 'retro-restoration'); ?></p>
        <?php endif; ?>
    </section>
</main>
<?php get_footer();
