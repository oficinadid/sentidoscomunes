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

							<?php

								$args = array(

									'role'      => 'subscriber',
									'orderby'	=> 'name',
									'order'		=> 'ASC'


									);
								$autores = get_users( $args );

							?>


							<?php foreach ($autores as $autor): ?>


								<div class="event">
									<div class="img">
										<?php $avatar = get_field('avatar', 'user_' . $autor->ID); ?>

										<?php if ($avatar): ?>
											<img class="avatar" src="<?php echo $avatar ?>" alt="" width="100" height="100">

										<?php else : ?>
											<?php echo get_avatar($autor->ID); ?>
										<?php endif ?>
									</div>
									<div class="desc">
										<?php if ($autor->first_name): ?>
											<h3><?php echo $autor->first_name ?> <?php echo $autor->last_name ?></h3>
										<?php else: ?>
											<h3><?php echo $autor->display_name ?></h3>
										<?php endif ?>

										<p><?php echo $autor->description ?></p>
										<ul class="meta">

											<?php if ($autor->twitter): ?>
												<li>
													<strong>Twitter:</strong>
													<span>@<?php echo $autor->twitter ?></span>
												</li>
											<?php elseif($autor->user_url): ?>
												<li>
													<strong>Website:</strong>
													<span><?php echo $autor->user_url ?></span>
												</li>
											<?php endif ?>

										</ul>
									</div>
									<div class="posts">
										<h4>Publicaciones</h4>

										<?php $publicaciones = get_posts( array( 'author' => $autor->ID, 'posts_per_page' => 5, 'fields' => 'ids', 'no_found_rows' => true ) ); ?>

										<?php $playlists = get_posts( array( 'post_type' => 'playlist', 'author' => $autor->ID, 'posts_per_page' => 5, 'fields' => 'ids', 'no_found_rows' => true ) ); ?>



										<ul>

										<?php $e=0; foreach ($playlists as $playlist): ?>
											<?php $e++ ?>
											<li>
												<a href="<?php echo get_permalink($playlist); ?>"><?php echo get_the_title($playlist); ?></a>
											</li>
										<?php endforeach ?>

										<?php $i=0; foreach ($publicaciones as $publicacion): ?>
											<?php $i++ ?>

											<li>
												<a href="<?php echo get_permalink($publicacion); ?>"><?php echo get_the_title($publicacion); ?></a>
											</li>


											<?php if ($i == 5): ?>
												<a href="<?php echo get_author_posts_url( $autor->ID ); ?>">Ver más posts</a>
											<?php endif ?>
										<?php endforeach ?>
										</ul>


   									</div>
								</div>

							<?php endforeach ?>

						</div>
					</section>
				</article>
		</section>
	</section>

<?php get_footer(); ?>