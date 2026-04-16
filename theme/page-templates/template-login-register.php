<?php
/**
 * Template Name: Login / Register
 * Template Post Type: page
 */

if (!defined('ABSPATH')) {
    exit;
}

$notice_code = isset($_GET['rr_notice']) ? sanitize_text_field(wp_unslash($_GET['rr_notice'])) : '';
$notice_map = [
    'invalid_nonce'            => ['type' => 'error', 'message' => __('Your session expired. Please try again.', 'retro-restoration')],
    'login_missing'            => ['type' => 'error', 'message' => __('Enter your email or username and password.', 'retro-restoration')],
    'login_invalid'            => ['type' => 'error', 'message' => __('We could not sign you in with those details.', 'retro-restoration')],
    'register_missing'         => ['type' => 'error', 'message' => __('Fill in the email address and both password fields.', 'retro-restoration')],
    'register_email_invalid'   => ['type' => 'error', 'message' => __('Enter a valid email address.', 'retro-restoration')],
    'register_email_taken'     => ['type' => 'error', 'message' => __('That email address is already in use.', 'retro-restoration')],
    'register_username_invalid'=> ['type' => 'error', 'message' => __('Choose a different username.', 'retro-restoration')],
    'register_password_short'   => ['type' => 'error', 'message' => __('Use a password with at least 8 characters.', 'retro-restoration')],
    'register_password_mismatch'=> ['type' => 'error', 'message' => __('The passwords do not match.', 'retro-restoration')],
    'register_failed'          => ['type' => 'error', 'message' => __('We could not create your account right now. Please try again.', 'retro-restoration')],
    'register_success'         => ['type' => 'success', 'message' => __('Your account has been created and you are now signed in.', 'retro-restoration')],
];

$notice = $notice_code && isset($notice_map[$notice_code]) ? $notice_map[$notice_code] : null;
$is_logged_in = is_user_logged_in();
$hero_title = $is_logged_in ? __('My Account', 'retro-restoration') : __('Login / Register', 'retro-restoration');
$hero_message = $is_logged_in
    ? __('Manage your profile, orders, addresses, and account settings from one place.', 'retro-restoration')
    : __('Sign in to your account or create a new one to start shopping faster.', 'retro-restoration');

get_header();
?>
<main class="rr-page-template rr-page-template--login-register">
    <section class="rr-starter-section rr-starter-section--hero">
        <h1><?php echo esc_html($hero_title); ?></h1>
        <p><?php echo esc_html($hero_message); ?></p>
    </section>

    <?php if ($notice) : ?>
        <section class="rr-starter-section rr-starter-section--content">
            <div class="rr-account-notice rr-account-notice--<?php echo esc_attr($notice['type']); ?>">
                <?php echo esc_html($notice['message']); ?>
            </div>
        </section>
    <?php endif; ?>

    <?php if ($is_logged_in) : ?>
        <section class="rr-starter-section rr-starter-section--content rr-account-section">
            <div class="rr-account-wrapper">
                <div class="rr-account-grid">
                    <article class="rr-account-panel">
                        <h2><?php esc_html_e('Account dashboard', 'retro-restoration'); ?></h2>
                        <?php if (shortcode_exists('woocommerce_my_account')) : ?>
                            <div class="rr-account-shell">
                                <?php echo do_shortcode('[woocommerce_my_account]'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            </div>
                        <?php else : ?>
                            <p><?php esc_html_e('WooCommerce is required to show the full account dashboard.', 'retro-restoration'); ?></p>
                        <?php endif; ?>
                    </article>
                </div>
            </div>
        </section>
    <?php else : ?>
        <section class="rr-starter-section rr-starter-section--content rr-account-section">
            <div class="rr-account-grid">
                <article class="rr-account-panel" id="login-panel">
                    <h2><?php esc_html_e('Log in', 'retro-restoration'); ?></h2>
                    <form class="rr-account-form" method="post" action="<?php echo esc_url(get_permalink()); ?>">
                        <?php wp_nonce_field('rr_account_auth', 'rr_account_auth_nonce'); ?>
                        <input type="hidden" name="rr_account_action" value="login" />

                        <div>
                            <label for="rr-login-identifier"><?php esc_html_e('Email or username', 'retro-restoration'); ?></label>
                            <input id="rr-login-identifier" name="rr_login_identifier" type="text" autocomplete="username" required />
                        </div>

                        <div>
                            <label for="rr-login-password"><?php esc_html_e('Password', 'retro-restoration'); ?></label>
                            <input id="rr-login-password" name="rr_login_password" type="password" autocomplete="current-password" required />
                        </div>

                        <label class="rr-account-checkbox" for="rr-login-remember">
                            <input id="rr-login-remember" name="rr_login_remember" type="checkbox" value="1" />
                            <span><?php esc_html_e('Remember me', 'retro-restoration'); ?></span>
                        </label>

                        <button type="submit" class="button"><?php esc_html_e('Sign in', 'retro-restoration'); ?></button>

                        <p class="rr-account-small-link">
                            <a href="#register-panel"><?php esc_html_e('Need an account? Create one here.', 'retro-restoration'); ?></a>
                        </p>
                    </form>
                </article>

                <article class="rr-account-panel" id="register-panel">
                    <h2><?php esc_html_e('Create an account', 'retro-restoration'); ?></h2>
                    <form class="rr-account-form" method="post" action="<?php echo esc_url(get_permalink()); ?>">
                        <?php wp_nonce_field('rr_account_auth', 'rr_account_auth_nonce'); ?>
                        <input type="hidden" name="rr_account_action" value="register" />

                        <div>
                            <label for="rr-register-username"><?php esc_html_e('Username', 'retro-restoration'); ?></label>
                            <input id="rr-register-username" name="rr_register_username" type="text" autocomplete="username" placeholder="<?php esc_attr_e('Optional', 'retro-restoration'); ?>" />
                        </div>

                        <div>
                            <label for="rr-register-email"><?php esc_html_e('Email address', 'retro-restoration'); ?></label>
                            <input id="rr-register-email" name="rr_register_email" type="email" autocomplete="email" required />
                        </div>

                        <div>
                            <label for="rr-register-password"><?php esc_html_e('Password', 'retro-restoration'); ?></label>
                            <input id="rr-register-password" name="rr_register_password" type="password" autocomplete="new-password" minlength="8" required />
                        </div>

                        <div>
                            <label for="rr-register-confirm-password"><?php esc_html_e('Confirm password', 'retro-restoration'); ?></label>
                            <input id="rr-register-confirm-password" name="rr_register_confirm_password" type="password" autocomplete="new-password" minlength="8" required />
                        </div>

                        <p class="rr-account-small-link">
                            <?php esc_html_e('By creating an account, you can track orders and manage your details faster.', 'retro-restoration'); ?>
                        </p>

                        <button type="submit" class="button"><?php esc_html_e('Create account', 'retro-restoration'); ?></button>

                        <p class="rr-account-small-link">
                            <a href="#login-panel"><?php esc_html_e('Already have an account? Sign in here.', 'retro-restoration'); ?></a>
                        </p>
                    </form>
                </article>
            </div>
        </section>
    <?php endif; ?>
</main>
<?php get_footer();