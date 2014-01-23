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
		<li><?php 
					if ( is_day() ) :
						printf( __( 'Archivo Diario: %s' ), '<span>' . get_the_date() . '</span>' );
					elseif ( is_month() ) :
						printf( __( 'Archivo Mensual: %s' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format' ) ) . '</span>' );
					elseif ( is_year() ) :
						printf( __( 'Archivo anual: %s' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format' ) ) . '</span>' );
					else :
						_e( 'Archivo' );
					endif;
				?></li>
	</ul>
	

	<section id="archive" class="wrapper">
		<header class="full">
			<h1>
				<?php 
					if ( is_day() ) :
						printf( __( 'Archivo Diario: %s' ), '<span>' . get_the_date() . '</span>' );
					elseif ( is_month() ) :
						printf( __( 'Archivo Mensual: %s' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format' ) ) . '</span>' );
					elseif ( is_year() ) :
						printf( __( 'Archivo anual: %s' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format' ) ) . '</span>' );
					else :
						_e( 'Archivo' );
					endif;
				?>
			</h1>
		</header>
		<div class="full">
			<?php while ( have_posts() ) : the_post(); ?>
				<article>
					<strong><?php $category = get_the_category(); echo $category[0]->cat_name; ?></strong>

					<?php var_dump(get_the_author()) ?>
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
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
