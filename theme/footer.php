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
                <ul class="rr-footer-social" aria-label="<?php esc_attr_e('Footer social links', 'retro-restoration'); ?>">
                    <li><a href="#" aria-label="Facebook">f</a></li>
                    <li><a href="#" aria-label="X">x</a></li>
                    <li><a href="#" aria-label="Instagram">ig</a></li>
                    <li><a href="#" aria-label="YouTube">yt</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
