<ul class="news-list slider-service">
	<?php
	$args = array(
		'post_type' => 'service',
		'posts_per_page' => 4 
	);
	$query = new WP_Query($args);
	while ($query->have_posts()) : $query->the_post();
		$thumbnail_id = get_post_thumbnail_id();
		$thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'full')[0];
		$service_img2 = get_post_meta(get_the_ID(), 'service_img2', true);
		$background_image = $service_img2 ? $service_img2 : $thumbnail_url;
		$service_description = get_post_meta(get_the_ID(), '事業説明', true);
?>
	<li class="content_over-flow">
	<a class="service_link" href="<?php the_permalink(); ?>" >
		<div class="service-item" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)),url(<?php echo esc_url($background_image); ?>); background-size: cover;">

			<div class="service_desc">
				<h2><?php echo get_post_meta( get_the_ID(), 'subtitle', true ); ?></h2>
				<h3><?php the_title(); ?></h3>
				<?php if (mb_strlen($service_description, 'UTF-8') > 40): ?>
				<p><?php echo mb_substr($service_description, 0, 60, 'UTF-8').'...'; ?></p>
				<?php else: ?>
				<p><?php echo $service_description; ?></p>
				<?php endif; ?>
			</div>
		</div>
	</a>
    </li>
    <?php endwhile; ?>
</ul>