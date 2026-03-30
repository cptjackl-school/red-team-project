<?php

if (!defined('ABSPATH')) {
    exit;
}

$title = isset($args['title']) ? (string) $args['title'] : get_the_title();
$subtitle = isset($args['subtitle']) ? (string) $args['subtitle'] : '';
$eyebrow = isset($args['eyebrow']) ? (string) $args['eyebrow'] : __('Retro Restoration', 'retro-restoration');
?>
<section class="rr-hero" aria-label="<?php echo esc_attr($title); ?>">
    <div class="rr-hero__inner">
        <p class="rr-eyebrow"><?php echo esc_html($eyebrow); ?></p>
        <h1><?php echo esc_html($title); ?></h1>
        <?php if ($subtitle !== '') : ?>
            <p><?php echo esc_html($subtitle); ?></p>
        <?php endif; ?>
    </div>
</section>
