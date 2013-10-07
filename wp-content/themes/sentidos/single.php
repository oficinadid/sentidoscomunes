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
		<li><a href=" <?php echo esc_url( $cat_link ); ?> "> <?php echo $cat_name; ?> </a> ›</li>
		<li><?php the_title();?></li>
	</ul>


	<section id="single" <?php post_class(); ?>>
		<?php 
			while ( have_posts() ) : the_post();
				if (in_category( 'noticias' )){ 
					get_template_part( 'content', 'news' );

				} else if  (in_category( 'columnas' )){
					get_template_part( 'content', 'column' );

				} else if (in_category( 'entrevistas' )){
					get_template_part( 'content', 'interview' );

				} else if (in_category( 'reportajes-graficos' )){
					get_template_part( 'content', 'photos' );
				} else{
					get_template_part( 'content', 'single' );

				}
			endwhile;
		?>
<!-- to be used as related "editions" -->
		<section id="related" class="full">
			<div class="wrapper">
			</div>
		</section>
<!-- to be used as related "editions" -->
	</section>

<?php get_footer(); ?>