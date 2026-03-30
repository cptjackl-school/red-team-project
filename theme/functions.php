<?php

if (!defined('ABSPATH')) {
    exit;
}

function retro_restoration_setup(): void
{
    add_theme_support('menus');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script']);

    register_nav_menus([
        'header_menu' => __('Header Menu', 'retro-restoration'),
        'footer_menu' => __('Footer Menu', 'retro-restoration'),
    ]);
}
add_action('after_setup_theme', 'retro_restoration_setup');

function retro_restoration_primary_menu_fallback($args = []): void
{
    $menu_class = !empty($args['menu_class']) ? sanitize_html_class($args['menu_class']) : 'rr-menu';
    $is_footer_menu = isset($args['theme_location']) && $args['theme_location'] === 'footer_menu';

    $featured_url = esc_url(home_url('/featured/'));
    $consoles_url = esc_url(home_url('/categories/'));
    $shop_url = esc_url(home_url('/shop/'));
    $tutorials_url = esc_url(retro_restoration_get_term_or_slug_url('post_tag', 'tutorials'));
    $reviews_url = esc_url(retro_restoration_get_term_or_slug_url('post_tag', 'reviews'));
    $video_tag_url = esc_url(retro_restoration_get_term_or_slug_url('post_tag', 'video'));
    $article_tag_url = esc_url(retro_restoration_get_term_or_slug_url('post_tag', 'article'));

    echo '<ul class="' . esc_attr($menu_class) . '">';

    if ($is_footer_menu) {
        echo '<li class="menu-item"><a href="' . $featured_url . '">' . esc_html__('Featured', 'retro-restoration') . '</a></li>';
        echo '<li class="menu-item"><a href="' . $consoles_url . '">' . esc_html__('Consoles', 'retro-restoration') . '</a></li>';
        echo '<li class="menu-item"><a href="' . $video_tag_url . '">' . esc_html__('Videos', 'retro-restoration') . '</a></li>';
        echo '<li class="menu-item"><a href="' . $article_tag_url . '">' . esc_html__('Articles', 'retro-restoration') . '</a></li>';
        echo '<li class="menu-item"><a href="' . $shop_url . '">' . esc_html__('Shop', 'retro-restoration') . '</a></li>';
        echo '</ul>';
        return;
    }

    echo '<li class="menu-item menu-item-has-children">';
    echo '<a href="' . $featured_url . '">' . esc_html__('Featured', 'retro-restoration') . '</a>';
    echo '<ul class="sub-menu">';
    echo '<li class="menu-item"><a href="' . $tutorials_url . '">' . esc_html__('Tutorials', 'retro-restoration') . '</a></li>';
    echo '<li class="menu-item"><a href="' . $reviews_url . '">' . esc_html__('Reviews', 'retro-restoration') . '</a></li>';
    echo '</ul>';
    echo '</li>';

    echo '<li class="menu-item menu-item-has-children">';
    echo '<a href="' . $consoles_url . '">' . esc_html__('Consoles', 'retro-restoration') . '</a>';
    echo '<ul class="sub-menu">';

    $default_category_id = (int) get_option('default_category');

    $parent_categories = get_categories([
        'taxonomy'   => 'category',
        'hide_empty' => false,
        'parent'     => 0,
        'exclude'    => [$default_category_id],
        'orderby'    => 'name',
        'order'      => 'ASC',
    ]);

    if (!empty($parent_categories)) {
        foreach ($parent_categories as $parent_category) {
            $parent_link = esc_url(get_category_link($parent_category->term_id));
            $child_categories = get_categories([
                'taxonomy'   => 'category',
                'hide_empty' => false,
                'parent'     => (int) $parent_category->term_id,
                'orderby'    => 'name',
                'order'      => 'ASC',
            ]);

            if (!empty($child_categories)) {
                echo '<li class="menu-item menu-item-has-children">';
                echo '<a href="' . $parent_link . '">' . esc_html($parent_category->name) . '</a>';
                echo '<ul class="sub-menu">';
                foreach ($child_categories as $child_category) {
                    echo '<li class="menu-item"><a href="' . esc_url(get_category_link($child_category->term_id)) . '">' . esc_html($child_category->name) . '</a></li>';
                }
                echo '</ul>';
                echo '</li>';
                continue;
            }

            echo '<li class="menu-item"><a href="' . $parent_link . '">' . esc_html($parent_category->name) . '</a></li>';
        }
    } else {
        echo '<li class="menu-item"><a href="' . $consoles_url . '">' . esc_html__('Browse categories', 'retro-restoration') . '</a></li>';
    }

    echo '</ul>';
    echo '</li>';

    echo '<li class="menu-item"><a href="' . $video_tag_url . '">' . esc_html__('Videos', 'retro-restoration') . '</a></li>';
    echo '<li class="menu-item"><a href="' . $article_tag_url . '">' . esc_html__('Articles', 'retro-restoration') . '</a></li>';
    echo '<li class="menu-item"><a href="' . $shop_url . '">' . esc_html__('Shop', 'retro-restoration') . '</a></li>';
    echo '</ul>';
}

function retro_restoration_get_term_or_slug_url(string $taxonomy, string $slug): string
{
    $term = get_term_by('slug', $slug, $taxonomy);

    if ($term && !is_wp_error($term)) {
        $term_link = get_term_link($term);
        if (!is_wp_error($term_link)) {
            return (string) $term_link;
        }
    }

    if ($taxonomy === 'post_tag') {
        return (string) home_url('/tag/' . trim($slug, '/') . '/');
    }

    if ($taxonomy === 'category') {
        return (string) home_url('/category/' . trim($slug, '/') . '/');
    }

    return (string) home_url('/' . trim($slug, '/') . '/');
}

function retro_restoration_enqueue_assets(): void
{
    $style_path = get_stylesheet_directory() . '/style.css';
    $style_ver  = file_exists($style_path) ? (string) filemtime($style_path) : wp_get_theme()->get('Version');

    wp_enqueue_style(
        'retro-restoration-style',
        get_stylesheet_uri(),
        [],
        $style_ver
    );
}
add_action('wp_enqueue_scripts', 'retro_restoration_enqueue_assets');
