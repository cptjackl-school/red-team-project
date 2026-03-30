<?php
/**
 * Template Name: Blog Homepage
 * Description: Custom homepage layout for a WordPress blog.
 */

if (!defined('ABSPATH')) {
	exit;
}

get_header();

$featured_query = new WP_Query([
	'post_type'           => 'post',
	'posts_per_page'      => 1,
	'ignore_sticky_posts' => 0,
]);

$latest_query = new WP_Query([
	'post_type'           => 'post',
	'posts_per_page'      => 6,
	'post_status'         => 'publish',
	'ignore_sticky_posts' => 1,
	'offset'              => $featured_query->have_posts() ? 1 : 0,
]);

$top_categories = get_categories([
	'orderby'    => 'count',
	'order'      => 'DESC',
	'number'     => 5,
	'hide_empty' => true,
]);
?>

<main class="rr-homepage">
	<section class="rr-hero" aria-label="<?php esc_attr_e('Homepage intro', 'retro-restoration'); ?>">
		<div class="rr-hero__inner">
			<p class="rr-eyebrow"><?php esc_html_e('Retro Restoration Blog', 'retro-restoration'); ?></p>
			<h1><?php echo esc_html(get_bloginfo('name')); ?></h1>
			<p><?php echo esc_html(get_bloginfo('description')); ?></p>
		</div>
	</section>

	<section class="rr-featured" aria-label="<?php esc_attr_e('Featured post', 'retro-restoration'); ?>">
		<h2><?php esc_html_e('Featured Story', 'retro-restoration'); ?></h2>

		<?php if ($featured_query->have_posts()) : ?>
			<?php while ($featured_query->have_posts()) : $featured_query->the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('rr-featured__card'); ?>>
					<a class="rr-featured__image" href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr(sprintf(__('Read %s', 'retro-restoration'), get_the_title())); ?>">
						<?php if (has_post_thumbnail()) : ?>
							<?php the_post_thumbnail('large'); ?>
						<?php endif; ?>
					</a>
					<div class="rr-featured__content">
						<p class="rr-featured__meta">
							<?php echo esc_html(get_the_date()); ?>
							<span aria-hidden="true"> | </span>
							<?php the_category(', '); ?>
						</p>
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<div class="rr-featured__excerpt"><?php the_excerpt(); ?></div>
						<a class="rr-button" href="<?php the_permalink(); ?>"><?php esc_html_e('Read article', 'retro-restoration'); ?></a>
					</div>
				</article>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		<?php else : ?>
			<p><?php esc_html_e('Publish your first post to feature it here.', 'retro-restoration'); ?></p>
		<?php endif; ?>
	</section>

	<section class="rr-latest" aria-label="<?php esc_attr_e('Latest posts', 'retro-restoration'); ?>">
		<div class="rr-section-head">
			<h2><?php esc_html_e('Latest Posts', 'retro-restoration'); ?></h2>
			<a href="<?php echo esc_url(get_permalink(get_option('page_for_posts')) ?: home_url('/')); ?>">
				<?php esc_html_e('View all posts', 'retro-restoration'); ?>
			</a>
		</div>

		<?php if ($latest_query->have_posts()) : ?>
			<div class="rr-latest__grid">
				<?php while ($latest_query->have_posts()) : $latest_query->the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class('rr-post-card'); ?>>
						<a class="rr-post-card__image" href="<?php the_permalink(); ?>">
							<?php if (has_post_thumbnail()) : ?>
								<?php the_post_thumbnail('medium_large'); ?>
							<?php endif; ?>
						</a>
						<div class="rr-post-card__body">
							<p class="rr-post-card__meta"><?php echo esc_html(get_the_date()); ?></p>
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<div class="rr-post-card__excerpt"><?php the_excerpt(); ?></div>
						</div>
					</article>
				<?php endwhile; ?>
			</div>
			<?php wp_reset_postdata(); ?>
		<?php else : ?>
			<p><?php esc_html_e('No recent posts found.', 'retro-restoration'); ?></p>
		<?php endif; ?>
	</section>

	<section class="rr-categories" aria-label="<?php esc_attr_e('Popular categories', 'retro-restoration'); ?>">
		<h2><?php esc_html_e('Popular Categories', 'retro-restoration'); ?></h2>

		<?php if (!empty($top_categories)) : ?>
			<ul class="rr-categories__list">
				<?php foreach ($top_categories as $category) : ?>
					<li>
						<a href="<?php echo esc_url(get_category_link($category->term_id)); ?>">
							<span><?php echo esc_html($category->name); ?></span>
							<span class="rr-count"><?php echo esc_html((string) $category->count); ?></span>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php else : ?>
			<p><?php esc_html_e('Create categories to organize your content.', 'retro-restoration'); ?></p>
		<?php endif; ?>
	</section>
</main>

<?php get_footer();
