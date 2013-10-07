<?php
	/*
	7 Latest Articles added to the "no dejes de leer" category
	*/
?>

	<section class="secondary">
		<big>No dejes de leer</big>
			<?php
			$args = array(
				'post_type' => 'page',
				'page_id' => 34681
			);
			$read_more = new WP_Query($args);
			if($read_more->have_posts()) : while($read_more->have_posts()): $read_more->the_post(); ?>
			
			<?php while(the_repeater_field('the_posts')): ?>
				<?php 
					$the_post = get_sub_field('the_post');
					$category = get_the_category( $the_post[0]->ID );
				?>

				<article>
					<h4><a href="<?php echo get_permalink( $the_post[0]->ID ) ?>"><?php echo($category[0]->cat_name); ?></a></h4>
					<h3><a href="<?php echo get_permalink( $the_post[0]->ID ) ?>"><?php echo get_the_title( $the_post[0]->ID ); ?></a></h3>
					<span class="readmore"><a href="<?php echo get_permalink( $the_post[0]->ID ) ?>">Seguir Leyendo</a></span>
				</article>

			<?php endwhile; ?>
			<?php endwhile; endif; ?>


		</article>
	</section>