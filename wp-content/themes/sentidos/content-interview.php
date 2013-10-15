<section id="content" class="wrapper">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<header class="full">
			<figure class="image">
				<?php the_post_thumbnail(); ?>
			</figure>
			<div class="titles">
				<strong><?php $category = get_the_category(); echo $category[0]->cat_name; ?></strong>
				<h1 class="title"><?php the_title(); ?></h1>
				<p class="source">Por: <?php echo get_the_author(); ?> / Fotos: <?php echo the_field('fotografo'); ?> / <?php echo get_the_date(); ?></p>
			</div>
		</header>

		<!--div class="meta">

			<big>No dejes de leer:</big>
			<ul>
				<?php
					global $post;
					$category = get_the_category($post->ID);
					$category = $category[0]->cat_ID;
					$myposts = get_posts(array('numberposts' => 5, 'offset' => 0, 'category__in' => array($category), 'post__not_in' => array($post->ID),'post_status'=>'publish'));
					foreach($myposts as $post) :
					setup_postdata($post);
				?>
				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				<?php endforeach; ?>
				<?php wp_reset_query(); ?>
			</ul>
			<big>Tags:</big>
			<ul class="tags">
				<?php 
					if(get_the_tag_list()) {
					    echo get_the_tag_list('<li>','</li><li>','</li>');
					}
				?>
			</ul>
			<ul class="social">
				<li class="twitter"><a href="https://twitter.com/share/" title="Compartir: <?php the_title(); ?>" target="_blank">Twitter</a></li>
				<li class="facebook"><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" title="Compartir: <?php the_title(); ?>" target="_blank">Facebook</a></li>
				<li><a href="<?php the_permalink(); ?>#disqus_thread" class="comments">:3</a></li>
				<li><a href="#comments" class="btn">Comentar</a></li>
			</ul>

			<small><?php edit_post_link(); ?></small>
		</div-->

		<section class="side">
			<article class="comentarios">
				<a href="#">
					<span class="title">Comentarios</span>
					<span class="count"><b><a href="<?php the_permalink(); ?>#disqus_thread" class="comments"></a></b></span>
					<div class="cf"></div>
				</a>
			</article>
			<article class="social">
				<div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-width="The pixel width of the plugin" data-height="The pixel height of the plugin" data-colorscheme="light" data-layout="button_count" data-action="like" data-show-faces="true" data-send="false"></div>
				<a href="https://twitter.com/share" class="twitter-share-button" data-lang="es">Twittear</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
			</article>
			<article class="otros">
				<h4>En esta edición SC</h4>

				<?php get_posts(  array(
					'numberposts'		=>	1,
					'category'			=>	'entrevistas',
					'orderby'			=>	'post_date',
					'order'				=>	'DESC',
					'exclude'			=>	get_the_ID(),
					'no_found_rows'     => true
					 )
				) ?>

				<div class="post">
					<a href="#">
						<div class="img">
							<img src="http://placehold.it/240x160">
						</div>
						<div class="texto">
							<span class="cat">Reportaje Gráfico</span>
							<h3>Nombre de columna destacada Lorem Ipsum arma net dera tara lieos</h3>
							<span class="autor">Por: David Salinas</span>
						</div>
					</a>
				</div>

				<div class="post">
					<a href="#">
						<div class="img">
							<img src="http://placehold.it/240x160">
						</div>
						<div class="texto">
							<span class="cat">Infografía</span>
							<h3>Nombre de columna destacada Lorem Ipsum arma net dera tara lieos</h3>
							<span class="autor">Por: David Salinas</span>
						</div>
					</a>
				</div>

				<div class="post">
					<a href="#">
						<div class="img">
							<img src="http://placehold.it/240x160">
						</div>
						<div class="texto">
							<span class="cat">Entrevista</span>
							<h3>Nombre de columna destacada Lorem Ipsum arma net dera tara lieos</h3>
							<span class="autor">Por: David Salinas</span>
						</div>
					</a>
				</div>

			</article>
		</section>

		<section class="content">
			<div id="the_content">
				<?php the_content(); ?>
			</div>
			<div id="comments">
				<?php comments_template( '', true ); ?>
			</div>
		</section>
	</article>
</section>