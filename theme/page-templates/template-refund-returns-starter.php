<?php
/**
 * Template Name: Starter - Refund Returns Page
 * Template Post Type: page
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>
<main class="rr-page-template rr-page-template--refund-returns-starter">
    <section class="rr-starter-section rr-starter-section--hero">
        <h1><?php esc_html_e('Refund & Returns Policy', 'retro-restoration'); ?></h1>
        <p><?php esc_html_e('Our commitment to your satisfaction with clear return and refund guidelines.', 'retro-restoration'); ?></p>
    </section>

    <section class="rr-starter-section rr-starter-section--content rr-refund-returns-content">
        <div class="rr-policy-section">
            <h2><?php esc_html_e('Returns', 'retro-restoration'); ?></h2>
            <p><?php esc_html_e('Items must be returned within 30 days of purchase in original condition and packaging.', 'retro-restoration'); ?></p>
            <ul>
                <li><?php esc_html_e('Items must be unused and in original packaging', 'retro-restoration'); ?></li>
                <li><?php esc_html_e('Return authorization required before shipping', 'retro-restoration'); ?></li>
                <li><?php esc_html_e('Customer responsible for return shipping costs', 'retro-restoration'); ?></li>
                <li><?php esc_html_e('Digital items are not eligible for return', 'retro-restoration'); ?></li>
            </ul>
        </div>

        <div class="rr-policy-section">
            <h2><?php esc_html_e('Refunds', 'retro-restoration'); ?></h2>
            <p><?php esc_html_e('Refunds will be processed within 5-7 business days after receipt of returned items.', 'retro-restoration'); ?></p>
            <ul>
                <li><?php esc_html_e('Refunds issued to original payment method', 'retro-restoration'); ?></li>
                <li><?php esc_html_e('Processing time varies by payment provider', 'retro-restoration'); ?></li>
                <li><?php esc_html_e('Store credit available as alternative', 'retro-restoration'); ?></li>
            </ul>
        </div>

        <div class="rr-policy-section">
            <h2><?php esc_html_e('Exchanges', 'retro-restoration'); ?></h2>
            <p><?php esc_html_e('We offer exchanges for different sizes, colors, or items of equal value.', 'retro-restoration'); ?></p>
        </div>

        <div class="rr-policy-section">
            <h2><?php esc_html_e('Contact Us', 'retro-restoration'); ?></h2>
            <p><?php esc_html_e('For returns or exchanges, please contact our customer service team.', 'retro-restoration'); ?></p>
            <p><strong><?php esc_html_e('Email:', 'retro-restoration'); ?></strong> returns@restoration.local</p>
            <p><strong><?php esc_html_e('Phone:', 'retro-restoration'); ?></strong> (555) 123-4567</p>
        </div>
    </section>
</main>
<?php get_footer(); ?>