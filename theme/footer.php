<?php

if (!defined('ABSPATH')) {
    exit;
}
?>
<footer class="rr-site-footer">
    <div class="rr-site-footer__inner">
        <div class="rr-footer-brand">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="rr-footer-brand__link"><?php bloginfo('name'); ?></a>
        </div>

        <div class="rr-footer-shell">
            <nav class="rr-footer-nav" aria-label="<?php esc_attr_e('Footer navigation', 'retro-restoration'); ?>">
                <?php
                wp_nav_menu([
                    'theme_location' => 'footer_menu',
                    'container'      => false,
                    'menu_class'     => 'rr-footer-menu',
                    'fallback_cb'    => 'retro_restoration_primary_menu_fallback',
                    'depth'          => 1,
                ]);
                ?>
            </nav>

            <div class="rr-footer-meta">
                <a href="<?php echo esc_url(home_url('/refund_returns/')); ?>" class="rr-footer-brand-link"><?php echo esc_html(get_bloginfo('name')); ?> &copy; <?php echo esc_html(date('Y')); ?></a>
                <?php $footer_social_links = retro_restoration_get_social_links(); ?>
                <?php if (!empty($footer_social_links)) : ?>
                    <ul class="rr-footer-social" aria-label="<?php esc_attr_e('Footer social links', 'retro-restoration'); ?>">
                        <?php retro_restoration_render_social_link_items(); ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
