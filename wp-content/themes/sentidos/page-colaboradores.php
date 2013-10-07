<?php get_header(); ?>

	<ul class="wrapper nav_bar">
		<li>Estas en: </li>
		<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Sentidos Comunes</a> ›</li>
		<li>Colaboradores</li>
	</ul>

	<section id="colaboradores" class="full">
		<section id="content" class="wrapper">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<header class="full">
						<div class="titles">
							<h1 class="title"><?php the_title(); ?></h1>
						</div>
					</header>

					<section class="content">
						<div id="the_content">

								<?php while(the_repeater_field('colaboradores')): ?>
	   									<div class="event">
										<div class="img">
											<?php if (get_sub_field('foto')): ?>
												<?php echo wp_get_attachment_image( get_sub_field('foto'), '320x215' ); ?>
											<?php endif ?>
										</div>
										<div class="desc">
											<h3><?php the_sub_field('nombre')?></h3>
											<p><?php the_sub_field('bio')?></p>
											<ul class="meta">
												<?php if (get_sub_field('twitter')): ?>
													<li>
														<strong>Twitter:</strong>
														<span><?php the_sub_field('twitter')?></span>
													</li>
												<?php endif ?>
												<?php if (get_sub_field('web')): ?>
													<li>
														<strong>Website:</strong>
														<span><?php the_sub_field('web')?></span>
													</li>
												<?php endif ?>
											</ul>
										</div>
										<div class="posts">
											<h4>Publicaciones</h4>
											<?php
											$posts = get_sub_field('publicaciones');
											 
											if( $posts ): ?>
												<ul>
												<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
													<?php setup_postdata($post); ?>
												    <li>
												    	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
												    </li>
												<?php endforeach; ?>
												</ul>
												<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
											<?php endif;?>

	   									</div>
									</div>

								<?php endwhile; ?>

						</div>
					</section>
				</article>
		</section>
	</section>

<?php get_footer(); ?>