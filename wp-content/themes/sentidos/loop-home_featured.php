<?php
	/*
	We get the lastest "custom post type edition",
	and populate the articles from the custom fields.
	Classes for sizes are extracted from a custom field in the original linked post.
	size1 = small = 320 x 215
	size2 = medium horizontal = 640 x 215
	size3 = medium vertical = 320 x 430
	size4 = big = 640 x 430
	*/
?>

<div class="wrapper">
	<h2 class="logo_big">Sentidos Comunes</h2>
	<section class="edition">

		<?php
			$post_size = array(4,3,3,4,4,3,3,1,1,1,1);

			$i = 0;

			$args = array(
				'post_type' => 'post',
				'posts_per_page' => 11,
				'cat' => -1
				// 'temas' => get_query_var('temas')
			);
			$grid_temas = new WP_Query($args);


			if($grid_temas->have_posts()) : while($grid_temas->have_posts()): $grid_temas->the_post(); ?>

				<?php
					$exposts[] = get_the_ID();

					if ($post_size[$i] == 1) {
						$thumb_size = '320x215';
					// } elseif ($post_size[$i] == 2) {
					// 	$thumb_size = '640x215';
					} elseif ($post_size[$i] == 3) {
						$thumb_size = '320x430';
					} elseif ($post_size[$i] == 4) {
						$thumb_size = '640x430';
					};
				 ?>
				<article class="post size<?php echo $post_size[$i] ?> none <?php $category = get_the_category( $the_post[0]->ID ); echo $category[0]->slug; ?>">
					<a href="<?php the_permalink(); ?>" class="img">
						<?php the_post_thumbnail($thumb_size); ?>
					</a>

					<div class="meta">
					<h4><?php echo $category[0]->cat_name ?></h4>
						<h3>
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h3>
					</div>
				</article>

			<?php $i++; endwhile;
			wp_reset_postdata();
			endif; ?>

		<div class="cf"></div>

	</section>
</div>