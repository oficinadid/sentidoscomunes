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

		<div class="meta">

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
		</div>

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