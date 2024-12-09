<div class="worls-list">
    <div class="works-item flex-box">
		<div class="works_desc title-box">
			<h2 style="margin: inherit;">WORKS</h2>
            <h3>施工実績</h3>
			<p>河野組(Kawanogumi)は、一件一件の工事にひたむきに取り組み、地道に信頼を積み重ねてきました。
おかげさまで、数多くのお客様より幅広くご依頼をいただいております。</p>
			<div class="btn-area works">
				<a href="<?php echo get_post_type_archive_link("works"); ?>" target="_blank" class="btn bgleft">
				<span>MORE　　</span>
				</a>
			</div>
		</div>
	 <div class="flex-box works-flex">
	    <?php
    	    $args = array(
    	        'post_type' => 'works',
        	    'posts_per_page' => 2 // 最新の2つの記事を表示
        	);
        	$query = new WP_Query($args);
        	while ($query->have_posts()) : $query->the_post();
				$works_type = get_post_meta( get_the_ID(), 'type', true );
				$works_address = get_post_meta( get_the_ID(), 'address', true );
    	?>
		
		<div class="works-case fadein-top view">
		<a class="service_link" href="<?php echo home_url( ); ?>/works/" >
		 <div class="works-case_back" style="background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.25) 0%, rgba(0, 0, 0, 0.25) 100%), url(<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>); background-size: cover; background-position-x: center;">
			 <div class="works-text">
				 <h3><?php the_title(); ?></h3>
				 <p><?php echo $works_type; ?></p>
				 <p><?php echo $works_address; ?></p>
			 </div>
		 </div>
		</a>
		</div>
		<?php endwhile; ?>
	 </div>
	</div>
</div>
