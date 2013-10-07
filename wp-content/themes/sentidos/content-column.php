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
				<big><?php $category = get_the_category(); echo $category[0]->cat_name; ?></big>
				<h1 class="title"><?php the_title(); ?></h1>
			</div>
			<div class="meta">
				<small><?php edit_post_link(); ?></small>
				<a href="<?php the_permalink(); ?>#disqus_thread" class="comments">comments</a>
				<big>Compartir</big>
				<ul class="social">
					<li class="twitter"><a href="https://twitter.com/share/" title="Compartir: <?php the_title(); ?>" target="_blank">Twitter</a></li>
					<li class="facebook"><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" title="Compartir: <?php the_title(); ?>" target="_blank">Facebook</a></li>
					<li class="google"><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" title="Compartir: <?php the_title(); ?>" target="_blank">Google</a></li>
				</ul>
			</div>
		</header>

		<section class="content">
			<div id="the_content">
				<div class="source">
					<img src="<?php print_r(the_field('foto_columnista')); ?>">
					<span><strong>Por:</strong> <?php the_field('columnista'); ?>, <?php echo get_the_date(); ?></span>
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