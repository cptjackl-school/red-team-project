<?php

if (!defined('ABSPATH')) {
    exit;
}

function retro_restoration_setup(): void
{
    add_theme_support('menus');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('woocommerce');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script']);

    register_nav_menus([
        'header_menu' => __('Header Menu', 'retro-restoration'),
        'footer_menu' => __('Footer Menu', 'retro-restoration'),
    ]);
}
add_action('after_setup_theme', 'retro_restoration_setup');

function retro_restoration_sanitize_social_url($url): string
{
    return esc_url_raw((string) $url);
}

function retro_restoration_customize_register(WP_Customize_Manager $customize_manager): void
{
    $customize_manager->add_section('retro_restoration_social_links', [
        'title'    => __('Social Links', 'retro-restoration'),
        'priority' => 160,
    ]);

    $social_links = [
        'facebook'  => __('Facebook URL', 'retro-restoration'),
        'x'         => __('X URL', 'retro-restoration'),
        'instagram' => __('Instagram URL', 'retro-restoration'),
        'discord'   => __('Discord URL', 'retro-restoration'),
        'youtube'   => __('YouTube URL', 'retro-restoration'),
    ];

    foreach ($social_links as $network => $label) {
        $setting_id = 'retro_restoration_social_' . $network . '_url';

        $customize_manager->add_setting($setting_id, [
            'default'           => '',
            'sanitize_callback' => 'retro_restoration_sanitize_social_url',
            'transport'         => 'refresh',
        ]);

        $customize_manager->add_control($setting_id, [
            'label'   => $label,
            'section' => 'retro_restoration_social_links',
            'type'    => 'url',
        ]);
    }
}
add_action('customize_register', 'retro_restoration_customize_register');

function retro_restoration_get_social_links(): array
{
    $social_links = [
        'facebook' => [
            'label' => __('Facebook', 'retro-restoration'),
            'url'   => (string) get_theme_mod('retro_restoration_social_facebook_url', ''),
        ],
        'x' => [
            'label' => __('X', 'retro-restoration'),
            'url'   => (string) get_theme_mod('retro_restoration_social_x_url', ''),
        ],
        'instagram' => [
            'label' => __('Instagram', 'retro-restoration'),
            'url'   => (string) get_theme_mod('retro_restoration_social_instagram_url', ''),
        ],
        'youtube' => [
            'label' => __('YouTube', 'retro-restoration'),
            'url'   => (string) get_theme_mod('retro_restoration_social_youtube_url', ''),
        ],
    ];

    return array_filter($social_links, static function (array $social_link): bool {
        return trim($social_link['url']) !== '';
    });
}

function retro_restoration_get_social_icon_markup(string $network): string
{
    switch ($network) {
        case 'facebook':
            return '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M14 8.5V7.3c0-.8.5-1.3 1.3-1.3H17V3h-2.1C12.1 3 10.5 4.6 10.5 7.1V8.5H8v3h2.5V21h3.5v-9.5h2.8l.4-3H14Z" fill="currentColor"/></svg>';
        case 'x':
            return '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M5 4h3.7l4.1 5.4L17.9 4H20l-6.1 7.2L20.9 20H17l-4.5-5.9L7.7 20H5.6l6.5-7.7L5 4Z" fill="currentColor"/></svg>';
        case 'instagram':
            return '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M7.5 3.5h9A4 4 0 0 1 20.5 7v10a4 4 0 0 1-4 4h-9a4 4 0 0 1-4-4V7a4 4 0 0 1 4-3.5Zm9 2h-9A2 2 0 0 0 5.5 7v10A2 2 0 0 0 7.5 19h9a2 2 0 0 0 2-2V7a2 2 0 0 0-2-1.5Zm-4.5 2.5a4 4 0 1 1 0 8 4 4 0 0 1 0-8Zm0 2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm4.8-3.6a1 1 0 1 1-1 1 1 1 0 0 1 1-1Z" fill="currentColor"/></svg>';
        case 'youtube':
            return '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M21.8 7.3a2.7 2.7 0 0 0-1.9-1.9C18.3 5 12 5 12 5s-6.3 0-7.9.4a2.7 2.7 0 0 0-1.9 1.9A28.1 28.1 0 0 0 2 12a28.1 28.1 0 0 0 .2 4.7 2.7 2.7 0 0 0 1.9 1.9C5.7 19 12 19 12 19s6.3 0 7.9-.4a2.7 2.7 0 0 0 1.9-1.9A28.1 28.1 0 0 0 22 12a28.1 28.1 0 0 0-.2-4.7ZM10 15.2V8.8l5.6 3.2L10 15.2Z" fill="currentColor"/></svg>';
        default:
            return '';
    }
}

function retro_restoration_render_social_link_items(): void
{
    $social_links = retro_restoration_get_social_links();

    foreach ($social_links as $network => $social_link) {
        $icon_markup = retro_restoration_get_social_icon_markup((string) $network);

        if ($icon_markup === '') {
            continue;
        }

        echo '<li class="rr-social-link rr-social-link--' . esc_attr($network) . '">';
        echo '<a href="' . esc_url($social_link['url']) . '" target="_blank" rel="noopener noreferrer" aria-label="' . esc_attr($social_link['label']) . '">';
        echo '<span class="screen-reader-text">' . esc_html($social_link['label']) . '</span>';
        echo '<span class="rr-social-link__icon">' . $icon_markup . '</span>';
        echo '</a>';
        echo '</li>';
    }
}

function retro_restoration_primary_menu_fallback($args = []): void
{
    $menu_class = !empty($args['menu_class']) ? sanitize_html_class($args['menu_class']) : 'rr-menu';
    $is_footer_menu = isset($args['theme_location']) && $args['theme_location'] === 'footer_menu';

    $featured_url = esc_url(home_url('/featured/'));
    $consoles_url = esc_url(home_url('/categories/'));
    $shop_url = esc_url(home_url('/shop/'));
    $tutorials_url = esc_url(retro_restoration_get_first_term_url('post_tag', ['tutorials', 'tutorial']));
    $reviews_url = esc_url(retro_restoration_get_first_term_url('post_tag', ['reviews', 'review']));
    $video_tag_url = esc_url(retro_restoration_get_first_term_url('post_tag', ['video', 'videos']));
    $article_tag_url = esc_url(retro_restoration_get_first_term_url('post_tag', ['article', 'articles']));

    echo '<ul class="' . esc_attr($menu_class) . '">';

    if ($is_footer_menu) {
        $account_base_url = (string) retro_restoration_account_page_url();
        $refund_policy_url = (string) home_url('/refund_returns/');
        $privacy_policy_url = function_exists('get_privacy_policy_url') ? (string) get_privacy_policy_url() : (string) home_url('/privacy-policy/');

        if (function_exists('wc_get_account_endpoint_url')) {
            $orders_url = (string) wc_get_account_endpoint_url('orders');
            $downloads_url = (string) wc_get_account_endpoint_url('downloads');
            $addresses_url = (string) wc_get_account_endpoint_url('edit-address');
            $account_details_url = (string) wc_get_account_endpoint_url('edit-account');
            $logout_url = (string) wc_get_account_endpoint_url('customer-logout');
        } else {
            $orders_url = trailingslashit($account_base_url) . 'orders/';
            $downloads_url = trailingslashit($account_base_url) . 'downloads/';
            $addresses_url = trailingslashit($account_base_url) . 'edit-address/';
            $account_details_url = trailingslashit($account_base_url) . 'edit-account/';
            $logout_url = wp_logout_url($account_base_url);
        }

        echo '<li class="menu-item"><a href="' . esc_url($account_base_url) . '">' . esc_html__('Dashboard', 'retro-restoration') . '</a></li>';
        echo '<li class="menu-item"><a href="' . esc_url($orders_url) . '">' . esc_html__('Orders', 'retro-restoration') . '</a></li>';
        echo '<li class="menu-item"><a href="' . esc_url($downloads_url) . '">' . esc_html__('Downloads', 'retro-restoration') . '</a></li>';
        echo '<li class="menu-item"><a href="' . esc_url($addresses_url) . '">' . esc_html__('Addresses', 'retro-restoration') . '</a></li>';
        echo '<li class="menu-item"><a href="' . esc_url($account_details_url) . '">' . esc_html__('Account details', 'retro-restoration') . '</a></li>';
        echo '<li class="menu-item"><a href="' . esc_url($refund_policy_url) . '">' . esc_html__('Refund policy', 'retro-restoration') . '</a></li>';
        echo '<li class="menu-item"><a href="' . esc_url($privacy_policy_url) . '">' . esc_html__('Privacy policy', 'retro-restoration') . '</a></li>';
        echo '<li class="menu-item"><a href="' . esc_url($logout_url) . '">' . esc_html__('Log out', 'retro-restoration') . '</a></li>';
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

function retro_restoration_get_first_term_url(string $taxonomy, array $slugs): string
{
    foreach ($slugs as $slug) {
        $term = get_term_by('slug', (string) $slug, $taxonomy);
        if ($term && !is_wp_error($term)) {
            $term_link = get_term_link($term);
            if (!is_wp_error($term_link)) {
                return (string) $term_link;
            }
        }
    }

    $fallback_slug = !empty($slugs) ? (string) $slugs[0] : '';
    return retro_restoration_get_term_or_slug_url($taxonomy, $fallback_slug);
}

function retro_restoration_get_archive_title(): string
{
    $title = wp_strip_all_tags((string) get_the_archive_title());
    $title = preg_replace('/^(Category|Tag|Author|Archives|Day|Month|Year|Product category|Product tag):\s*/i', '', $title);

    return trim((string) $title);
}

function retro_restoration_get_account_page_slug(): string
{
    return 'my-account';
}

function retro_restoration_get_account_page_id(): ?int
{
    $page = get_page_by_path(retro_restoration_get_account_page_slug());
    if ($page instanceof WP_Post) {
        return (int) $page->ID;
    }

    return null;
}

function retro_restoration_account_page_url(): string
{
    $page_id = retro_restoration_get_account_page_id();
    if ($page_id) {
        return (string) get_permalink($page_id);
    }

    return home_url('/' . retro_restoration_get_account_page_slug() . '/');
}

function retro_restoration_account_redirect(array $query_args = []): void
{
    $url = retro_restoration_account_page_url();

    if (!empty($query_args)) {
        $url = add_query_arg($query_args, $url);
    }

    wp_safe_redirect($url);
    exit;
}

function retro_restoration_generate_unique_username(string $base_username): string
{
    $base_username = sanitize_user($base_username, true);

    if ($base_username === '') {
        $base_username = 'user';
    }

    $candidate = $base_username;
    $suffix = 1;

    while (username_exists($candidate)) {
        $candidate = $base_username . $suffix;
        $suffix++;
    }

    return $candidate;
}

function retro_restoration_handle_account_form_submission(): void
{
    if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_POST['rr_account_action'])) {
        return;
    }

    $action = sanitize_text_field(wp_unslash($_POST['rr_account_action']));
    $nonce = isset($_POST['rr_account_auth_nonce']) ? sanitize_text_field(wp_unslash($_POST['rr_account_auth_nonce'])) : '';

    if (!wp_verify_nonce($nonce, 'rr_account_auth')) {
        retro_restoration_account_redirect(['rr_notice' => 'invalid_nonce']);
    }

    if ($action === 'login') {
        $identifier = isset($_POST['rr_login_identifier']) ? sanitize_text_field(wp_unslash($_POST['rr_login_identifier'])) : '';
        $password = isset($_POST['rr_login_password']) ? (string) wp_unslash($_POST['rr_login_password']) : '';

        if ($identifier === '' || $password === '') {
            retro_restoration_account_redirect(['rr_notice' => 'login_missing']);
        }

        $user = is_email($identifier) ? get_user_by('email', $identifier) : get_user_by('login', $identifier);

        if (!$user instanceof WP_User && is_email($identifier)) {
            $user = get_user_by('email', $identifier);
        }

        if (!$user instanceof WP_User) {
            retro_restoration_account_redirect(['rr_notice' => 'login_invalid']);
        }

        $signed_in = wp_signon([
            'user_login'    => $user->user_login,
            'user_password' => $password,
            'remember'      => !empty($_POST['rr_login_remember']),
        ], is_ssl());

        if (is_wp_error($signed_in)) {
            retro_restoration_account_redirect(['rr_notice' => 'login_invalid']);
        }

        retro_restoration_account_redirect();
    }

    if ($action === 'register') {
        $username_input = isset($_POST['rr_register_username']) ? sanitize_user(wp_unslash($_POST['rr_register_username']), true) : '';
        $email = isset($_POST['rr_register_email']) ? sanitize_email(wp_unslash($_POST['rr_register_email'])) : '';
        $password = isset($_POST['rr_register_password']) ? (string) wp_unslash($_POST['rr_register_password']) : '';
        $confirm_password = isset($_POST['rr_register_confirm_password']) ? (string) wp_unslash($_POST['rr_register_confirm_password']) : '';

        if ($email === '' || $password === '' || $confirm_password === '') {
            retro_restoration_account_redirect(['rr_notice' => 'register_missing']);
        }

        if (!is_email($email)) {
            retro_restoration_account_redirect(['rr_notice' => 'register_email_invalid']);
        }

        if (email_exists($email)) {
            retro_restoration_account_redirect(['rr_notice' => 'register_email_taken']);
        }

        if (strlen($password) < 8) {
            retro_restoration_account_redirect(['rr_notice' => 'register_password_short']);
        }

        if ($password !== $confirm_password) {
            retro_restoration_account_redirect(['rr_notice' => 'register_password_mismatch']);
        }

        $base_username = $username_input !== '' ? $username_input : (string) strstr($email, '@', true);
        $username = retro_restoration_generate_unique_username($base_username);

        if ($username === '') {
            retro_restoration_account_redirect(['rr_notice' => 'register_username_invalid']);
        }

        $user_id = wp_insert_user([
            'user_login' => $username,
            'user_pass'  => $password,
            'user_email' => $email,
            'role'       => function_exists('wc_create_new_customer') ? 'customer' : 'subscriber',
        ]);

        if (is_wp_error($user_id)) {
            retro_restoration_account_redirect(['rr_notice' => 'register_failed']);
        }

        wp_set_current_user((int) $user_id);
        wp_set_auth_cookie((int) $user_id, true, is_ssl());

        retro_restoration_account_redirect(['rr_notice' => 'register_success']);
    }

    retro_restoration_account_redirect();
}
add_action('template_redirect', 'retro_restoration_handle_account_form_submission');

function retro_restoration_ensure_account_page_exists(): void
{
    $slug = retro_restoration_get_account_page_slug();
    $template = 'page-templates/template-login-register.php';
    $page_id = retro_restoration_get_account_page_id();

    if ($page_id) {
        $current_template = get_post_meta($page_id, '_wp_page_template', true);
        if ($current_template !== $template) {
            update_post_meta($page_id, '_wp_page_template', $template);
        }

        return;
    }

    $new_id = wp_insert_post([
        'post_title'   => __('Login / Register', 'retro-restoration'),
        'post_name'    => $slug,
        'post_status'  => 'publish',
        'post_type'    => 'page',
        'post_content' => '',
        'post_author'  => get_current_user_id() ?: 1,
    ], true);

    if (!is_wp_error($new_id)) {
        update_post_meta($new_id, '_wp_page_template', $template);
    }
}
add_action('init', 'retro_restoration_ensure_account_page_exists');

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

function retro_restoration_disable_woocommerce_sidebar(): void
{
    if (is_admin()) {
        return;
    }

    remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
}
add_action('wp', 'retro_restoration_disable_woocommerce_sidebar');

function retro_restoration_comment_card(WP_Comment $comment, array $args, int $depth): void
{
    $GLOBALS['comment'] = $comment;

    get_template_part('template-parts/comments/comment-card', null, [
        'comment'        => $comment,
        'args'           => $args,
        'depth'          => $depth,
        'comment_number' => 0,
    ]);
}

add_filter('registration_redirect', function() {
    return home_url();
});
