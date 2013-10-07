
<?php get_header(); ?>

	<?php 
		$category = get_the_category();
		$cat_name = $category[0]->cat_name;
		$cat_id = get_cat_ID( $cat_name );
		$cat_link = get_category_link($cat_id);
	?> 

	<ul class="wrapper nav_bar">
		<li>Estas en: </li>
		<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Sentidos Comunes</a> ›</li>
		<li><a href=" <?php echo esc_url( home_url( '/via-publica' ) ); ?> "> <?php echo $cat_name; ?> </a> ›</li>
		<li><?php the_title();?></li>
	</ul>


	<section id="via-publica" class="full">
		<section id="content" class="wrapper">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<header class="full">
						<div class="titles">
							<big>Vía Publica</big>
							<h1 class="title"><?php the_title(); ?></h1>
							<ul>
								<li><?php the_field('evento')?></li>
								<li><?php the_field('ubicacion')?></li>
								<li><?php the_date()?></li>
								<?php edit_post_link('Editar', '<li>', '</li>'); ?>
							</ul>
						</div>
						<ul class="social">
							<li class="twitter"><a href="https://twitter.com/share/" title="Compartir: <?php the_title(); ?>" target="_blank">Twitter</a></li>
							<li class="facebook"><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" title="Compartir: <?php the_title(); ?>" target="_blank">Facebook</a></li>
							<li class="google"><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" title="Compartir: <?php the_title(); ?>" target="_blank">Google</a></li>
						</ul>
					</header>

					<section class="content">
						<div id="the_content">

							<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

								<?php while(the_repeater_field('galeria')): ?>

									<figure>
										<?php echo wp_get_attachment_image( get_sub_field('imagen'), '320x320' ); ?>
										<figcaption>
											<h3><?php the_sub_field('titulo')?></h3>
											<p><?php the_sub_field('caption')?></p>
										</figcaption>
									</figure>

								<?php endwhile; ?>
				            <?php endwhile; ?>
				            <?php endif; ?>	

						</div>
						<ul class="tags">
							<li><strong>Claves:</strong></li>
							<?php 
								if(get_the_tag_list()) {
								    echo get_the_tag_list('<li>','</li><li>','</li>');
								}
							?>
						</ul>
					</section>
				</article>
		</section>
	</section>

<?php get_footer(); ?>