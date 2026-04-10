<?php
/**
 * Template Name: Starter - Privacy Policy Page
 * Template Post Type: page
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>
<main class="rr-page-template rr-page-template--privacy-starter">
    <section class="rr-starter-section rr-starter-section--hero">
        <h1><?php esc_html_e('Privacy Policy Starter', 'retro-restoration'); ?></h1>
        <p><?php esc_html_e('Starter structure for your policy content and legal review.', 'retro-restoration'); ?></p>
    </section>

    <section class="rr-starter-section rr-starter-section--content">
        <h2><?php esc_html_e('Suggested Sections', 'retro-restoration'); ?></h2>
        <ul>
            <li><?php esc_html_e('Information collected', 'retro-restoration'); ?></li>
            <li><?php esc_html_e('How data is used', 'retro-restoration'); ?></li>
            <li><?php esc_html_e('Cookies and third-party services', 'retro-restoration'); ?></li>
            <li><?php esc_html_e('User rights and contact details', 'retro-restoration'); ?></li>
        </ul>

        <div class="rr-policy-placeholder">
            <p><?php esc_html_e('Replace this placeholder with your finalized privacy policy text.', 'retro-restoration'); ?></p>
        </div>
    </section>
</main>
<?php get_footer();
