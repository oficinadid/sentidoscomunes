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
		<li>Playlists</li>
	</ul>
	

	<section id="archive" class="wrapper images short">
		<header class="full">
			<h1>Noticias</h1>
		</header>
		<div class="full">
			<?php while ( have_posts() ) : the_post(); ?>
				<article>
					<figure>
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('320x215'); ?></a>
					</figure>
					<strong><?php $category = get_the_category(); echo $category[0]->cat_name; ?></strong>
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
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
