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

            <ul class="rr-social-links" aria-label="<?php esc_attr_e('Social links', 'retro-restoration'); ?>">
                <li class="rr-register-button"><a href="<?php echo esc_url(home_url('/account/')); ?>" class="rr-register-link"><?php _e('Account', 'retro-restoration'); ?></a></li>
                <li><a href="#" aria-label="Facebook">f</a></li>
                <li><a href="#" aria-label="X">x</a></li>
                <li><a href="#" aria-label="Instagram">ig</a></li>
                <li><a href="#" aria-label="YouTube">yt</a></li>
            </ul>
        </div>
    </div>
</header>
