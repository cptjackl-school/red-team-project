<?php
/**
 * Template Name: Starter - Return Policy Page
 * Template Post Type: page
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>
<main class="rr-page-template rr-page-template--return-policy-starter">
    <section class="rr-starter-section rr-starter-section--hero">
        <h1><?php esc_html_e('Return Policy', 'retro-restoration'); ?></h1>
        <p><?php esc_html_e('Our straightforward return policy ensures your satisfaction with every purchase.', 'retro-restoration'); ?></p>
    </section>

    <section class="rr-starter-section rr-starter-section--content rr-return-policy-content">
        <div class="rr-policy-section">
            <h2><?php esc_html_e('Return Window', 'retro-restoration'); ?></h2>
            <p><?php esc_html_e('You have 30 days from the date of purchase to initiate a return. Items must be in their original condition and packaging.', 'retro-restoration'); ?></p>
        </div>

        <div class="rr-policy-section">
            <h2><?php esc_html_e('Eligible Items', 'retro-restoration'); ?></h2>
            <p><?php esc_html_e('Most items are eligible for return, with some exceptions:', 'retro-restoration'); ?></p>
            <ul>
                <li><?php esc_html_e('Custom or personalized items', 'retro-restoration'); ?></li>
                <li><?php esc_html_e('Digital downloads and software', 'retro-restoration'); ?></li>
                <li><?php esc_html_e('Items damaged due to misuse or normal wear', 'retro-restoration'); ?></li>
                <li><?php esc_html_e('Perishable goods', 'retro-restoration'); ?></li>
            </ul>
        </div>

        <div class="rr-policy-section">
            <h2><?php esc_html_e('Return Process', 'retro-restoration'); ?></h2>
            <p><?php esc_html_e('To start a return:', 'retro-restoration'); ?></p>
            <ol>
                <li><?php esc_html_e('Contact our customer service team', 'retro-restoration'); ?></li>
                <li><?php esc_html_e('Receive a return authorization number', 'retro-restoration'); ?></li>
                <li><?php esc_html_e('Package the item securely with all original materials', 'retro-restoration'); ?></li>
                <li><?php esc_html_e('Ship to the provided return address', 'retro-restoration'); ?></li>
            </ol>
        </div>

        <div class="rr-policy-section">
            <h2><?php esc_html_e('Refunds & Exchanges', 'retro-restoration'); ?></h2>
            <p><?php esc_html_e('Once your return is received and inspected:', 'retro-restoration'); ?></p>
            <ul>
                <li><?php esc_html_e('Refunds are processed within 5-7 business days', 'retro-restoration'); ?></li>
                <li><?php esc_html_e('Original payment method will be refunded', 'retro-restoration'); ?></li>
                <li><?php esc_html_e('Exchanges are available for different sizes/colors', 'retro-restoration'); ?></li>
                <li><?php esc_html_e('Store credit is available as an alternative option', 'retro-restoration'); ?></li>
            </ul>
        </div>

        <div class="rr-policy-section">
            <h2><?php esc_html_e('Shipping Costs', 'retro-restoration'); ?></h2>
            <p><?php esc_html_e('Return shipping costs are the responsibility of the customer, unless the item arrived damaged or defective.', 'retro-restoration'); ?></p>
        </div>

        <div class="rr-policy-section">
            <h2><?php esc_html_e('Contact Information', 'retro-restoration'); ?></h2>
            <p><?php esc_html_e('Questions about returns? Contact our team:', 'retro-restoration'); ?></p>
            <p><strong><?php esc_html_e('Email:', 'retro-restoration'); ?></strong> returns@restoration.local</p>
            <p><strong><?php esc_html_e('Phone:', 'retro-restoration'); ?></strong> (555) 123-4567</p>
            <p><strong><?php esc_html_e('Hours:', 'retro-restoration'); ?></strong> Monday-Friday, 9 AM - 5 PM EST</p>
        </div>
    </section>
</main>
<?php get_footer(); ?>