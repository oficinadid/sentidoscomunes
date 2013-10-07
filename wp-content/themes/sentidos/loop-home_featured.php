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
		$args = array(
			'post_type' => 'edicion',
			'posts_per_page' => 1
		);
		$featured = new WP_Query($args);

		if($featured->have_posts()) : while($featured->have_posts()): $featured->the_post(); ?>
<!-- 
			<nav>
				<?php
					$count_posts = wp_count_posts('edicion');
				?>
				<div class="title">
					<span>Nº<?php echo $count_posts->publish ?></span>
					<a href="<?php the_permalink(); ?>" class="current"><?php the_title(); ?></a>
				</div>

				<a href="<?php echo get_bloginfo(url); ?>/edicion" class="back">Ediciónes Anteriores ›</a>
			</nav> 
-->

			<?php while(the_repeater_field('featured_posts')): ?>

				<?php
					$the_post = get_sub_field('post_destacado');

					// asignamos tamaño de imagen thumbnail
					if (get_sub_field('tamano') == 'size1') {
						$thumb_size = '320x214';
					} elseif (get_sub_field('tamano') == 'size2') {
						$thumb_size = '640x215';
					} elseif (get_sub_field('tamano') == 'size3') {
						$thumb_size = '320x430';
					} elseif (get_sub_field('tamano') == 'size4') {
						$thumb_size = '640x430';
					}

				?>

				<article class="post <?php the_sub_field('tamano') ?> <?php the_sub_field('color_destacado') ?> <?php $category = get_the_category( $the_post[0]->ID ); echo $category[0]->slug; ?>">
					<a href="<?php echo get_permalink( $the_post[0]->ID ) ?>" class="img">

					<?php if (get_sub_field('imagen_destacada')): ?>
						<?php
							$imgID = get_sub_field('imagen_destacada');
							echo wp_get_attachment_image( $imgID, $thumb_size );
						?>
					<?php else: ?>

						<?php if ($category[0]->cat_name != 'Ediciones'): ?>
							<?php echo get_the_post_thumbnail( $the_post[0]->ID, $thumb_size ); ?>
						<?php endif ?>
						
					<?php endif ?>


					</a>
					<div class="meta">
						<h4>
						<?php 
							$category = get_the_category( $the_post[0]->ID );
							if ($category[0]->cat_name == 'Ediciones') {
								echo 'Editorial';
							} else {
								echo ($category[0]->cat_name);
							}
					
							
						?>
						</h4>
						<h3>
							<a href="<?php echo get_permalink( $the_post[0]->ID ) ?>"><?php
								if ($category[0]->cat_name == 'Ediciones') {
										echo get_field('titulo_editorial');
								}else{
									if (get_sub_field('titulo_opcional')) {
										echo get_sub_field('titulo_opcional');
									} else {
										echo get_the_title( $the_post[0]->ID );
									}
								}							 	
							 ?></a>
						</h3>


						<?php if (get_field('columnista', $the_post[0]->ID)) { ?>
							<small>Por: <?php the_field('columnista', $the_post[0]->ID); ?></small>
						<?php } elseif (get_field('autor', $the_post[0]->ID)) { ?>
							<small>Por: <?php the_field('autor', $the_post[0]->ID); ?></small>
						<?php } else{ ?>
							<small>Por: Sentidos Comunes</small>
						<?php } ?>

					</div>
				</article>

			<?php endwhile; ?>


		<?php endwhile;
		wp_reset_postdata();
		endif; ?>

		<div class="cf"></div>
		
	</section>
</div>