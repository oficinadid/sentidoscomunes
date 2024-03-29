<aside class="sidebar">
	<section class="side">
		<article class="comentarios">

			<span class="title">Comentarios</span>
			<span class="count"><a href="<?php the_permalink(); ?>#disqus_thread" class="comments"></a></span>
			<div class="cf"></div>

		</article>
		<article class="social">
			<div class="fb-like" data-href="<?php the_permalink(); ?>" data-width="40" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
			<a href="https://twitter.com/share" class="twitter-share-button" data-lang="es">Twittear</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
		</article>
		<article class="otros">
			<h4>En esta edición SC</h4>

			<?php 
				$edicion_entrevista = get_posts(  array(
					'post_type' 		=> 'post',
					'numberposts'		=>	1,
					'category_name'		=>	'entrevistas',
					'orderby'			=>	'post_date',
					'order'				=>	'DESC',
					'exclude'			=>	get_the_ID(),
					'no_found_rows'     => true
					 )
				) ;

				$edicion_infografia = get_posts(  array(
					'post_type' 		=> 'post',
					'numberposts'		=>	1,
					'category_name'		=>	'infografias',
					'orderby'			=>	'post_date',
					'order'				=>	'DESC',
					'exclude'			=>	get_the_ID(),
					'no_found_rows'     => true
					 )
				) ;

				$edicion_reportaje = get_posts(  array(
					'post_type' 		=> 'post',
					'numberposts'		=>	1,
					'category_name'		=>	'reportajes-graficos',
					'orderby'			=>	'post_date',
					'order'				=>	'DESC',
					'exclude'			=>	get_the_ID(),
					'no_found_rows'     => true
					 )
				) ;


			?>
			
			<?php foreach ($edicion_entrevista as $entrevista): ?>
				
				<div class="post">
					<a href="<?php echo get_permalink( $entrevista->ID ) ?>">
						<div class="img">
							<?php echo get_the_post_thumbnail( $entrevista->ID, '320x215' ) ?>
						</div>
						<div class="texto">
							<span class="cat">Entrevista</span>
							<h3><?php echo get_the_title( $entrevista->ID ) ?></h3>
							<span class="autor">Por: <?php echo get_the_author_meta( 'display_name', $entrevista->post_author ) ?></span>
						</div>
					</a>
				</div>
			<?php endforeach ?>

			<?php foreach ($edicion_infografia as $infografia): ?>
				
				<div class="post">
					<a href="<?php echo get_permalink( $infografia->ID ) ?>">
						<div class="img">
							<?php echo get_the_post_thumbnail( $infografia->ID, '320x215' ) ?>
						</div>
						<div class="texto">
							<span class="cat">Infografia</span>
							<h3><?php echo get_the_title( $infografia->ID ) ?></h3>
							<span class="autor">Por: <?php echo get_the_author_meta( 'display_name', $infografia->post_author ) ?></span>
						</div>
					</a>
				</div>
			<?php endforeach ?>

			<?php foreach ($edicion_reportaje as $reportaje): ?>
				
				<div class="post">
					<a href="<?php echo get_permalink( $reportaje->ID ) ?>">
						<div class="img">
							<?php echo get_the_post_thumbnail( $reportaje->ID, '320x215' ) ?>
						</div>
						<div class="texto">
							<span class="cat">Reportaje Gráfico</span>
							<h3><?php echo get_the_title( $reportaje->ID ) ?></h3>
							<span class="autor">Por: <?php echo get_the_author_meta( 'display_name', $reportaje->post_author ) ?></span>
						</div>
					</a>
				</div>
			<?php endforeach ?>

			

		</article>
	</section>

	
	<?php dynamic_sidebar( 'Posts Sidebar' ); ?>


</aside>
