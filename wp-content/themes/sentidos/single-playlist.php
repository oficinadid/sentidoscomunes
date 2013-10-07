
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
		<li><a href=" <?php echo esc_url( home_url( '/playlist' ) ); ?> "> <?php echo $cat_name; ?> </a> ›</li>
		<li><?php the_title();?></li>
	</ul>

	<section id="playlist" class="full">
		<section id="content" class="wrapper">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<header class="full">
						<div class="titles">
							<big>Playlist</big>
							<h1 class="title"><?php the_title(); ?></h1>
							<ul>
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
						<figure class="image">
							<?php the_post_thumbnail(); ?>
						</figure>
						<div id="the_content">

							<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
								<div class="embeed">
									<?php the_field('embed_playlist')?>
								</div>
								<div class="meta">

										<img src="<?php the_field('imagen_autor')?>"/>

										<?php if ( get_field('url_autor') ): ?>
											<a href="<?php the_field('url_autor') ?>" target="blank_">
												<h4><?php the_field('autor')?></h4>
											</a>
										<?php else: ?>
												<h4><?php the_field('autor')?></h4>
										<?php endif ?>

										<?php the_field('descripcion_autor')?>
								</div>

				            <?php endwhile; ?>
				            <?php endif; ?>	

						</div>
					</section>
				</article>
		</section>
	</section>

<?php get_footer(); ?>