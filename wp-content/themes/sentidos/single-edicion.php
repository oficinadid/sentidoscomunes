
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
		<li><a href=" <?php echo esc_url( home_url( '/edicion' ) ); ?> "> <?php echo $cat_name; ?> </a> ›</li>
		<li><?php the_title();?></li>
	</ul>

<div class="wrapper">
	<section class="edition">


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


						<?php if ((get_field('columnista', $the_post[0]->ID)) && (get_field('columnista', $the_post[0]->ID) != 'Sentidos Comunes')) { ?>
							<small>Por: <?php the_field('columnista', $the_post[0]->ID); ?></small>
						<?php } elseif (get_field('autor', $the_post[0]->ID)) { ?>
							<small>Por: <?php the_field('autor', $the_post[0]->ID); ?></small>
						<?php } else{ ?>
							<!-- <small>Por: Sentidos Comunes</small> -->
						<?php } ?>

					</div>
				</article>

			<?php endwhile; ?>




		<div class="cf"></div>

	</section>
</div>

	<section id="via-publica" class="full">
		<section id="content" class="wrapper">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<header class="full">
						<!-- <figure class="image">
							<?php the_post_thumbnail('1280'); ?>
						</figure> -->


						<div class="titles">
							<big>En esta edición</big>
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
						<div id="the_content" class="center">
							<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<div class="con_left">
								<big>Editorial</big>
								<?php the_content(); ?>
							</div>
							<div class="con_right">
								<big>Indice</big>
								<ul>
									<?php while(the_repeater_field('featured_posts')): ?>
										<?php $the_post = get_sub_field('post_destacado'); ?>
										<li>
											<h4><?php $category = get_the_category( $the_post[0]->ID ); echo $category[0]->cat_name; ?></h4>
											<h3><a href="<?php echo get_permalink( $the_post[0]->ID ) ?>"><?php echo get_the_title( $the_post[0]->ID ) ?></a></h3>
										</li>
									<?php endwhile; ?>
								</ul>
							</div>
							<?php endwhile; ?>
				            <?php endif; ?>

						</div>
					</section>
				</article>
		</section>
	</section>

<?php get_footer(); ?>