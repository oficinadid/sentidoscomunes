<?php 
	/*
	5 Latest Articles added to the "noticias" category
	First new has to show the featured image
	*/
?>
	<section class="main">
		<big>Noticias</big>

		<?php
		$args = array(
			'post_type' => 'post',
			'posts_per_page' => 5,
			'category_name' => 'noticias',
			'category__not_in' => array( 2757 ) // no dejes de leer
		);
		$noticias_home = new WP_Query($args);
		$i = 0;
	
		if($noticias_home->have_posts()) : while($noticias_home->have_posts()): $noticias_home->the_post(); ?>

			<article>
				<?php if ($i==0): ?>
					<a href="<?php the_permalink(); ?>" class="tmb"><?php the_post_thumbnail( '640x320' ) ?></a>
				<?php endif ?>
				
				<!--h4>
					<?php $category = get_the_category(); ?>
					<a href="<?php echo get_category_link($category[0]->term_id ) ?>"><?php echo $category[0]->cat_name; ?></a>
				</h4-->
				<h3><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h3>
				<p><?php the_excerpt(); ?></p>
				<div class="full">
					<h5>Por: <?php the_author() ?></h5>
					<a href="<?php the_permalink(); ?>" class="readmore">Seguir Leyendo</a>
				</div>
			</article>
	
		<?php $i++; endwhile;
		wp_reset_postdata();
		endif; ?>
		
	</section>	