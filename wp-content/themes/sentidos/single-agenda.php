<?php 
  setlocale(LC_ALL, 'es_ES.utf8');
  $current_day = null;
?>

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
		<li><a href=" <?php echo esc_url( home_url( '/agenda' ) ); ?> "> <?php echo $cat_name; ?> </a> ›</li>
		<li><?php the_title();?></li>
	</ul>

	<section id="agenda" class="full">
		<section id="content" class="wrapper">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<header class="full">
						<div class="titles">
							<big>Agenda</big>
							<h1 class="title"><?php the_title(); ?></h1>
						</div>
						<ul class="social">
							<li class="twitter"><a href="https://twitter.com/share/" title="Compartir: <?php the_title(); ?>" target="_blank">Twitter</a></li>
							<li class="facebook"><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" title="Compartir: <?php the_title(); ?>" target="_blank">Facebook</a></li>
							<li class="google"><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" title="Compartir: <?php the_title(); ?>" target="_blank">Google</a></li>
						</ul>
					</header>

					<section class="content">
						<div id="the_content">

								<?php while(the_repeater_field('day')): ?>

									<?php $fecha = new DateTime(get_sub_field('dia')); ?>

									<?php if ($current_day != $fecha): ?>
	   									<div class="event <?php the_sub_field('dia')?>">
											<div class="date">
												<?php $current_day = $fecha; ?>
												<strong><?php echo strftime("%e",strtotime($fecha->format("Y/m/d"))); ?> </strong>
												<small><?php echo strftime("%A",strtotime($fecha->format("Y/m/d"))); ?></small>
											</div>
									<?php else: ?>
	   									<div class="event sameday">
		   									<div class="box">
		   									</div>
									<?php endif; ?>

										<div class="img">
											<?php if (get_sub_field('imagen_evento')): ?>
												<?php echo wp_get_attachment_image( get_sub_field('imagen_evento'), '320x215' ); ?>
											<?php endif ?>
										</div>
										<div class="desc">
											<h3><?php the_sub_field('titulo_evento')?></h3>
											<p><?php the_sub_field('descripcion_evento')?></p>
										</div>
										<ul class="meta">
											<?php if (get_sub_field('ubicacion_evento')): ?>
												<li>
													<strong>Ubicación:</strong>
													<span><?php the_sub_field('ubicacion_evento')?></span>
												</li>
											<?php endif ?>
											<?php if (get_sub_field('horario_evento')): ?>
												<li>
													<strong>Horario:</strong>
													<span><?php the_sub_field('horario_evento')?></span>
												</li>
											<?php endif ?>
											<?php if (get_sub_field('url_evento')): ?>
												<li>
													<strong>Más información:</strong>
													<a href="<?php the_sub_field('url_evento')?>"><?php the_sub_field('url_evento')?></a>
												</li>
											<?php endif ?>
										</ul>
									</div>

								<?php endwhile; ?>

						</div>
					</section>
				</article>
		</section>
	</section>

<?php get_footer(); ?>