<aside class="sidebar">
<!-- 
	<div class="banner">
		<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/inc/banners/300x300.png" /></a>
	</div> -->

	<div class="related_posts">
		<big>Relacionados</big>
		<?php
			$tags = wp_get_post_tags($post->ID);
			if ($tags) {
				$first_tag = $tags[0]->term_id;
				$args=array(
				'tag__in' => array($first_tag),
				'post__not_in' => array($post->ID),
				'posts_per_page'=>3,
				'caller_get_posts'=>1
				);
				$my_query = new WP_Query($args);
				if( $my_query->have_posts() ) {
					while ($my_query->have_posts()) : $my_query->the_post();
		?>

			<article>
				<a href="<?php the_permalink(); ?>">
					<h4><?php $category = get_the_category(); echo $category[0]->cat_name; ?></h4>
					<h3><?php the_title(); ?></h3>
					<span href="<?php the_permalink(); ?>" class="readmore">Seguir Leyendo</span>
					<div class="cf"></div>
				</a>
			</article>

		<?php
			endwhile; }
			wp_reset_query();}
		?>
	</div>

	
	<?php dynamic_sidebar( 'Posts Sidebar' ); ?>


</aside>
