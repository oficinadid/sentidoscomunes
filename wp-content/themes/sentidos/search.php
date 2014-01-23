<?php get_header(); ?>
	<ul class="wrapper nav_bar">
		<li>Estas en: </li>
		<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Sentidos Comunes</a> ›</li>
		<li>Busqueda</li>
	</ul>

	<section id="archive" class="wrapper">
		<header class="full">
			<h1>Resultados para: <?php print_r(get_search_query()) ?></h1>
		</header>
		<div class="full">
			<?php while ( have_posts() ) : the_post(); ?>
				<article>
					
					<strong><?php $category = get_the_category(); echo $category[0]->cat_name; ?></strong>
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

					<?php if (get_post_type() == 'post' ): ?>
						<span>Por: <?php the_author() ?></span>
					<?php endif ?>
					
					<?php the_excerpt(); ?>
					<a href="<?php the_permalink(); ?>" class="readmore">Seguir Leyendo</a>
				</article>
			 <?php endwhile; ?>
		</div>
		<?php 
			if(function_exists('wp_pagenavi')) {
			wp_pagenavi();
			}
		?>
	</section>

<?php get_footer(); ?>