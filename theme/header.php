<?php

if (!defined('ABSPATH')) {
    exit;
}
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="rr-site-header">
    <div class="rr-site-header__inner">
        <div class="rr-brand-block">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="rr-brand-block__link"><?php bloginfo('name'); ?></a>
        </div>

        <div class="rr-nav-shell">
            <nav class="rr-primary-nav" aria-label="<?php esc_attr_e('Primary navigation', 'retro-restoration'); ?>">
                <?php
                wp_nav_menu([
                    'theme_location' => 'header_menu',
                    'container'      => false,
                    'menu_class'     => 'rr-menu',
                    'fallback_cb'    => 'retro_restoration_primary_menu_fallback',
                    'depth'          => 3,
                ]);
                ?>
            </nav>

            <?php $header_social_links = retro_restoration_get_social_links(); ?>
            <?php $discord_url = (string) get_theme_mod('retro_restoration_social_discord_url', ''); ?>
            <ul class="rr-social-links" aria-label="<?php esc_attr_e('Social links', 'retro-restoration'); ?>">
                <li class="rr-register-button"><a href="<?php echo esc_url(home_url('/my-account/')); ?>" class="rr-register-link"><?php _e('Account', 'retro-restoration'); ?></a></li>
                <?php if ($discord_url !== '') : ?>
                    <li class="rr-discord-button"><a href="<?php echo esc_url($discord_url); ?>" class="rr-discord-link" target="_blank" rel="noopener noreferrer"><?php _e('Discord', 'retro-restoration'); ?></a></li>
                <?php endif; ?>
                <?php if (!empty($header_social_links)) : ?>
                    <?php retro_restoration_render_social_link_items(); ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</header>
