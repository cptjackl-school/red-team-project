<?php

if (!defined('ABSPATH')) {
    exit;
}
?>
<footer>
    <p><?php echo esc_html(get_bloginfo('name')); ?> &copy; <?php echo esc_html(date('Y')); ?></p>
</footer>
<?php wp_footer(); ?>
</body>
</html>
