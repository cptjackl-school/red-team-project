<?php

if (!defined('ABSPATH')) {
	exit;
}

get_header();

$spotlight_query = new WP_Query([
	'post_type'           => 'post',
	'posts_per_page'      => 4,
	'post_status'         => 'publish',
	'ignore_sticky_posts' => 1,
]);

$spotlight_posts = $spotlight_query->posts;

$videos_query = new WP_Query([
	'post_type'           => 'post',
	'posts_per_page'      => 6,
	'post_status'         => 'publish',
	'ignore_sticky_posts' => 1,
	'tag'                 => 'video',
]);

$topic_sections = [
	[
		'title' => __('Articles', 'retro-restoration'),
		'tags'  => ['article', 'articles'],
	],
	[
		'title' => __('Reviews', 'retro-restoration'),
		'tags'  => ['reviews', 'review'],
	],
	[
		'title' => __('Tutorials', 'retro-restoration'),
		'tags'  => ['tutorials', 'tutorial'],
	],
];
?>

<main class="rr-homepage">
	<section class="rr-spotlight" aria-label="<?php esc_attr_e('Recent posts spotlight', 'retro-restoration'); ?>">
		<div class="rr-spotlight__head">
			<h2><?php esc_html_e('Recent Posts', 'retro-restoration'); ?></h2>
		</div>

		<?php if (!empty($spotlight_posts)) : ?>
			<div class="rr-spotlight__grid">
				<?php
				$lead_post = $spotlight_posts[0];
				$side_posts = array_slice($spotlight_posts, 1, 3);
				$lead_categories = get_the_category($lead_post->ID);
				$lead_label = !empty($lead_categories) ? $lead_categories[0]->name : __('Blog', 'retro-restoration');
				setup_postdata($lead_post);
				?>
				<article id="post-<?php echo esc_attr($lead_post->ID); ?>" <?php post_class('rr-spotlight-card rr-spotlight-card--lead', $lead_post->ID); ?>>
					<a class="rr-spotlight-card__media" href="<?php echo esc_url(get_permalink($lead_post)); ?>" aria-label="<?php echo esc_attr(get_the_title($lead_post)); ?>">
						<?php if (has_post_thumbnail($lead_post->ID)) : ?>
							<?php echo get_the_post_thumbnail($lead_post->ID, 'large'); ?>
						<?php endif; ?>
					</a>
					<div class="rr-spotlight-card__overlay"></div>
					<div class="rr-spotlight-card__content">
						<p class="rr-spotlight-card__tag"><?php echo esc_html($lead_label); ?></p>
						<h3><a href="<?php echo esc_url(get_permalink($lead_post)); ?>"><?php echo esc_html(get_the_title($lead_post)); ?></a></h3>
						<p class="rr-spotlight-card__meta"><?php echo esc_html(get_the_author_meta('display_name', $lead_post->post_author)); ?> <span aria-hidden="true">|</span> <?php echo esc_html(human_time_diff(get_the_time('U', $lead_post), current_time('timestamp')) . ' ' . __('ago', 'retro-restoration')); ?></p>
					</div>
				</article>
				<?php wp_reset_postdata(); ?>

				<div class="rr-spotlight__side">
					<?php foreach ($side_posts as $index => $side_post) : ?>
						<?php setup_postdata($side_post); ?>
						<article id="post-<?php echo esc_attr($side_post->ID); ?>" <?php post_class('rr-spotlight-card rr-spotlight-card--side', $side_post->ID); ?>>
							<a class="rr-spotlight-card__media" href="<?php echo esc_url(get_permalink($side_post)); ?>" aria-label="<?php echo esc_attr(get_the_title($side_post)); ?>">
								<?php if (has_post_thumbnail($side_post->ID)) : ?>
									<?php echo get_the_post_thumbnail($side_post->ID, 'medium_large'); ?>
								<?php endif; ?>
							</a>
							<div class="rr-spotlight-card__overlay"></div>
							<div class="rr-spotlight-card__content">
								<h4><a href="<?php echo esc_url(get_permalink($side_post)); ?>"><?php echo esc_html(get_the_title($side_post)); ?></a></h4>
							</div>
							<span class="rr-spotlight-card__number"><?php echo esc_html((string) ($index + 1)); ?></span>
						</article>
					<?php endforeach; ?>
					<?php wp_reset_postdata(); ?>
				</div>
			</div>
		<?php else : ?>
			<p><?php esc_html_e('Add a few posts to build your homepage spotlight.', 'retro-restoration'); ?></p>
		<?php endif; ?>
	</section>

	<section class="rr-video-strip" aria-label="<?php esc_attr_e('Recent videos', 'retro-restoration'); ?>">
		<div class="rr-video-strip__head">
			<h2><?php esc_html_e('Recent Videos', 'retro-restoration'); ?></h2>
		</div>
		<?php if ($videos_query->have_posts()) : ?>
			<div class="rr-video-strip__row">
				<?php while ($videos_query->have_posts()) : $videos_query->the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class('rr-video-thumb'); ?>>
						<a class="rr-video-thumb__media" href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr(get_the_title()); ?>">
							<?php if (has_post_thumbnail()) : ?>
								<?php the_post_thumbnail('medium_large'); ?>
							<?php endif; ?>
							<span class="rr-video-thumb__play" aria-hidden="true">&#9654;</span>
						</a>
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					</article>
				<?php endwhile; ?>
			</div>
		<?php else : ?>
			<p><?php esc_html_e('Add posts tagged video to populate this section.', 'retro-restoration'); ?></p>
		<?php endif; ?>
		<?php wp_reset_postdata(); ?>
	</section>

	<section class="rr-topic-columns" aria-label="<?php esc_attr_e('Topic columns', 'retro-restoration'); ?>">
		<div class="rr-topic-columns__grid">
			<?php foreach ($topic_sections as $topic_section) : ?>
				<?php
				$topic_query = new WP_Query([
					'post_type'           => 'post',
					'posts_per_page'      => 3,
					'post_status'         => 'publish',
					'ignore_sticky_posts' => 1,
					'tag_slug__in'        => $topic_section['tags'],
				]);
				?>
				<div class="rr-topic-column">
					<h2><?php echo esc_html($topic_section['title']); ?></h2>
					<?php if ($topic_query->have_posts()) : ?>
						<ul>
							<?php while ($topic_query->have_posts()) : $topic_query->the_post(); ?>
								<li>
									<a class="rr-topic-preview" href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr(get_the_title()); ?>">
										<span class="rr-topic-preview__media">
											<?php if (has_post_thumbnail()) : ?>
												<?php the_post_thumbnail('thumbnail'); ?>
											<?php endif; ?>
										</span>
										<span class="rr-topic-preview__body">
											<span class="rr-topic-preview__title"><?php the_title(); ?></span>
											<span class="rr-topic-preview__date"><?php echo esc_html(get_the_date()); ?></span>
										</span>
									</a>
								</li>
							<?php endwhile; ?>
						</ul>
					<?php else : ?>
						<p><?php esc_html_e('No posts yet.', 'retro-restoration'); ?></p>
					<?php endif; ?>
					<?php wp_reset_postdata(); ?>
				</div>
			<?php endforeach; ?>
		</div>
	</section>
</main>

<?php get_footer();
