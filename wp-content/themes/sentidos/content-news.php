<section id="content" class="wrapper">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<header class="full">
			<div class="titles">
				<ul class="tags">
					<li><strong>Claves:</strong></li>
					<?php 
						if(get_the_tag_list()) {
						    echo get_the_tag_list('<li>','</li><li>','</li>');
						}
					?>
				</ul>
				<h1 class="title"><?php the_title(); ?></h1>
				<p class="date"><?php the_date('l, j F, Y'); ?></p>
			</div>
			
		</header>

		<section class="content">
			<div id="the_content">
				<div class="source"> <strong>Fuente: </strong>
					<?php 
	  					$source="fuente"; 
	  					$source_url="fuente_url"; 
	  					if(get_post_meta($post->ID, $source, true)){
	  						if(get_post_meta($post->ID, $source_url, true)){
	  							echo('<a href="'.get_post_meta($post->ID, $source_url, true).'">'.get_post_meta($post->ID, $source, true).'</a>');
		  					}else{
		  						echo get_post_meta($post->ID, $source, true);
		  					}
	  					}
					 ?>
				</div>
				<?php the_content(); ?>
			</div>
			<div id="comments">
				<?php comments_template( '', true ); ?>
			</div>
		</section>

		<?php get_template_part( 'sidebar', 'single' ); ?>

	</article>
</section>