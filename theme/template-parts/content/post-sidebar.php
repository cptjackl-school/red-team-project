<?php

if (!defined('ABSPATH')) {
    exit;
}

$categories_list = get_the_category_list(', ');
$tags_list       = get_the_tag_list('', ', ');
$summary_text    = has_excerpt()
    ? get_the_excerpt()
    : wp_trim_words(wp_strip_all_tags(strip_shortcodes(get_the_content())), 28, '...');
?>
<aside class="rr-post-sidebar" aria-label="<?php esc_attr_e('Post details', 'retro-restoration'); ?>">
    <p class="rr-post-sidebar__kicker"><?php esc_html_e('Post Details', 'retro-restoration'); ?></p>
    <h2 class="rr-post-sidebar__title"><?php the_title(); ?></h2>

    <p class="rr-post-sidebar__description"><?php echo esc_html($summary_text); ?></p>

    <ul class="rr-post-sidebar__list">
        <li>
            <span class="rr-post-sidebar__label"><?php esc_html_e('Category', 'retro-restoration'); ?></span>
            <span class="rr-post-sidebar__value"><?php echo !empty($categories_list) ? wp_kses_post($categories_list) : esc_html__('Uncategorized', 'retro-restoration'); ?></span>
        </li>
        <li>
            <span class="rr-post-sidebar__label"><?php esc_html_e('Tags', 'retro-restoration'); ?></span>
            <span class="rr-post-sidebar__value"><?php echo !empty($tags_list) ? wp_kses_post($tags_list) : esc_html__('No tags', 'retro-restoration'); ?></span>
        </li>
    </ul>

</aside>
