<?php 
	/*
	5 Latest Articles added to the "noticias" category
	First new has to show the featured image
	*/
	global $post;
?>
<div class="slider-rp">
	<ul>
	<?php while(the_repeater_field('galeria')): ?>
		<li>
			
			<?php echo wp_get_attachment_image( get_sub_field('imagen'), '1280' ) ?>
			<div class="info">
				<?php the_sub_field('caption') ?>
			</div>
		</li>
	<?php endwhile; ?>
	</ul>
	<a href="#" class="slider-arrow prev"><</a>
	<a href="#" class="slider-arrow next">></a>
</div>
